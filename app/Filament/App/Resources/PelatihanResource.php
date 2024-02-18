<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PelatihanResource\Pages;
use App\Filament\App\Resources\PelatihanResource\RelationManagers;
use App\Models\Pelatihan;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class PelatihanResource extends Resource
{
    protected static ?string $model = Pelatihan::class;

    protected static ?string $navigationLabel = 'Pelatihan';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('nama')
                            ->required(),
                        Select::make('kategori_id')
                            ->relationship(name: 'kategori', titleAttribute: 'nama')
                            ->native(false)
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('nama')
                                    ->required(),
                            ])
                            ->required(),
                        Textarea::make('deskripsi')
                            ->columnSpan('full')
                            ->required(),
                    ])->columns(2),

                Section::make('Image')
                    ->schema([
                        FileUpload::make('image_url')
                            ->hiddenLabel()
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('uploads')
                            ->visibility('public')
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240)
                            ->required(),
                    ]),

                Section::make('Waktu dan Tempat Pelaksanaan')
                    ->schema([
                        TextInput::make('tempat_pelaksanaan')
                            ->required(),
                        DatePicker::make('tanggal_pelaksanaan')
                            ->native(false)
                            ->required(),
                        TimePicker::make('jam_mulai')
                            // ->timezone('Indonesia/Jakarta')
                            ->required(),
                        TimePicker::make('jam_selesai')
                            ->required(),
                    ])->columns(2),

                Section::make('Pendaftaran')
                    ->schema([
                        Select::make('jenis_pelaksanaan')
                            ->options([
                                'terbatas' => 'Terbatas',
                                'umum' => 'Umum',
                            ])
                            ->required(),
                        TextInput::make('kuota')
                            ->numeric()
                            ->required(),
                        DatePicker::make('tanggal_mulai_pendaftaran')
                            ->native(false)
                            ->required(),
                        DatePicker::make('tanggal_akhir_pendaftaran')
                            ->native(false)
                            ->required(),
                    ])->columns(2),

                Section::make('Mentor')
                    ->schema([
                        Select::make('user_id')
                            ->relationship('mentor', 'name')
                            ->native(false)
                            ->preload()
                            ->searchable()
                            ->hiddenLabel()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('email')
                                    ->required(),
                                TextInput::make('password')
                                    ->required(),
                                Hidden::make('role')
                                    ->default('mentor'),
                            ])
                            ->required(),
                    ]),

                Section::make('Status Pelaksanaan')
                    ->schema([
                        Radio::make('status_pelaksanaan')
                            ->options([
                                'selesai' => 'Selesai',
                                'proses' => 'Proses',
                                'batal' => 'Batal',
                            ])
                            ->hiddenLabel()
                            ->hiddenOn('create')
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')
                    ->rowIndex(),
                ImageColumn::make('image_url')
                    ->label('Photo')
                    ->square(),
                TextColumn::make('nama')
                    ->sortable()
                    ->searchable()
                    ->translateLabel(),
                TextColumn::make('mentor.name')
                    ->sortable()
                    ->searchable()
                    ->url(fn () => route('filament.admin.auth.profile')),
                TextColumn::make('tanggal_pelaksanaan'),
                TextColumn::make('status_pelaksanaan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'proses' => 'warning',
                        'selesai' => 'success',
                        'batal' => 'danger',
                    }),
            ])
            ->filters([
                SelectFilter::make('jenis_kuota')
                    ->options([
                        'limited' => 'Limited',
                        'unlimited' => 'Unlimited'
                    ]),
                SelectFilter::make('status_pelaksanaan')
                    ->options([
                        'selesai' => 'Selesai',
                        'proses' => 'Proses',
                        'batal' => 'Batal'
                    ]),
                SelectFilter::make('mentor')
                    ->preload()
                    ->relationship('mentor', 'name'),
                SelectFilter::make('kategori')
                    ->preload()
                    ->relationship('kategori', 'nama'),
            ])
            ->actions([
                // ActionGroup::make([
                //     ViewAction::make(),
                //     EditAction::make(),
                //     DeleteAction::make(),
                // ])->tooltip('Actions')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PendaftaranRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPelatihans::route('/'),
            'create' => Pages\CreatePelatihan::route('/create'),
            'view' => Pages\ViewPelatihan::route('/{record}'),
            'edit' => Pages\EditPelatihan::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id())->count();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }
}
