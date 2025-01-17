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
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\NumberConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint\Operators\IsRelatedToOperator;
use Filament\Tables\Filters\QueryBuilder\Constraints\SelectConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class PelatihanResource extends Resource
{
    protected static ?string $model = Pelatihan::class;

    protected static ?string $navigationLabel = 'Pelatihan';

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Deskripsi Pelatihan')
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

                Section::make('Aset Pelatihan')
                    ->schema([
                        FileUpload::make('image_url')
                            ->label('Cover pelatihan')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('images')
                            ->visibility('public')
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240)
                            ->required(),

                        FileUpload::make('modul_pelatihan')
                            ->directory('files')
                            ->visibility('public')
                            ->openable()
                            ->downloadable()
                            ->maxSize(30720)
                            ->required(),
                    ])->columns(2),

                Section::make('Waktu dan Tempat Pelaksanaan')
                    ->schema([
                        Radio::make('tipe_pelaksanaan')
                            ->options([
                                'offline' => 'Offline',
                                'online' => 'Online',
                            ])
                            ->inline()
                            ->columnSpan('full')
                            ->default('offline')
                            ->live(),
                        TextInput::make('tempat_pelaksanaan')
                            ->hidden(fn (Get $get) => $get('tipe_pelaksanaan') !== 'offline'),
                        TextInput::make('link_online')
                            ->label('Link Zoom/Meet')
                            ->hidden(fn (Get $get) => $get('tipe_pelaksanaan') !== 'online'),
                        DatePicker::make('tanggal_pelaksanaan')
                            ->native(false)
                            ->required(),
                        TimePicker::make('jam_mulai')
                            // ->timezone('Indonesia/Jakarta')
                            ->required(),
                        TimePicker::make('jam_selesai')
                            // ->native(false)
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

                Section::make('Biaya Pelatihan')
                    ->schema([
                        TextInput::make('harga')
                            ->prefix('Rp')
                            ->numeric()
                            ->required(),
                        TextInput::make('diskon')
                            ->suffix('%')
                            ->numeric()
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
                        Radio::make('status_pendaftaran')
                            ->inline()
                            ->options([
                                'buka' => 'Buka',
                                'tutup' => 'Tutup',
                            ]),
                        Radio::make('status_kuota')
                            ->inline()
                            ->options([
                                'tersedia' => 'Tersedia',
                                'penuh' => 'Penuh',
                            ]),
                        Radio::make('status_pelaksanaan')
                            ->inline()
                            ->options([
                                'selesai' => 'Selesai',
                                'proses' => 'Proses',
                                'batal' => 'Batal',
                            ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                // 'mentor.nama',
                Group::make('kategori.nama')
                    ->collapsible(),
                Group::make('mentor.name')
                    ->collapsible(),
            ])
            ->columns([
                TextColumn::make('No')->rowIndex(),
                ImageColumn::make('image_url')
                    ->square()
                    ->label('Photo'),
                TextColumn::make('nama')
                    ->sortable()
                    ->searchable()
                    ->translateLabel(),
                TextColumn::make('mentor.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tempat_pelaksanaan')
                    ->toggleable(),
                TextColumn::make('tanggal_pelaksanaan')
                    ->toggleable(),
                TextColumn::make('jam_mulai')
                    ->toggleable(),
                TextColumn::make('jam_selesai')
                    ->toggleable(),
                TextColumn::make('harga')
                    ->toggleable(),
                TextColumn::make('status_pelaksanaan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'proses' => 'warning',
                        'selesai' => 'success',
                        'batal' => 'danger',
                    }),
            ])
            ->filters([
                QueryBuilder::make()
                    ->constraints([
                        TextConstraint::make('nama'),
                        DateConstraint::make('tanggal_pelaksanaan'),
                        TextConstraint::make('tempat_pelaksanaan'),
                        SelectConstraint::make('jenis_pelaksanaan')
                            ->searchable()
                            ->options([
                                'terbatas' => 'Terbatas',
                                'umum' => 'Umum',
                            ]),
                        NumberConstraint::make('harga')
                            ->icon('heroicon-m-currency-dollar'),
                        SelectConstraint::make('status_pendaftaran')
                            ->searchable()
                            ->options([
                                'buka' => 'Buka',
                                'tutup' => 'Tutup',
                            ]),
                        SelectConstraint::make('status_kuota')
                            ->searchable()
                            ->options([
                                'tersedia' => 'Tersedia',
                                'penuh' => 'Penuh',
                            ]),
                        SelectConstraint::make('status_pelaksanaan')
                            ->searchable()
                            ->options([
                                'selesai' => 'Selesai',
                                'proses' => 'Proses',
                                'batal' => 'Batal',
                            ]),
                        RelationshipConstraint::make('kategori') // Filter the `creator` relationship
                            ->selectable(
                                IsRelatedToOperator::make()
                                    ->titleAttribute('nama')
                                    ->searchable(),
                            ),
                        RelationshipConstraint::make('mentor') // Filter the `creator` relationship
                            ->selectable(
                                IsRelatedToOperator::make()
                                    ->titleAttribute('name')
                                    ->searchable(),
                            ),
                    ])
            ], layout: FiltersLayout::AboveContentCollapsible)
            ->actions([
                // ActionGroup::make([
                // ViewAction::make(),
                // EditAction::make(),
                // DeleteAction::make(),
                // ])->tooltip('Actions')
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
        if (auth()->user()->role !== 'admin') {
            return parent::getEloquentQuery()->where('user_id', auth()->id());
        }

        return parent::getEloquentQuery();
    }
}
