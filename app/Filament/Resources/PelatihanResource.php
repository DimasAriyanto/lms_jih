<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelatihanResource\Pages;
use App\Filament\Resources\PelatihanResource\RelationManagers;
use App\Models\Pelatihan;
use App\Models\User;
use Filament\Forms;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
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

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Management Pelatihan';

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
                            ->native(false)
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

                Section::make('Harga')
                    ->schema([
                        TextInput::make('harga')
                            ->numeric()
                            ->required(),
                        TextInput::make('diskon')
                            ->numeric()
                            ->required(),
                    ])->columns(2),

                Section::make('Mentor')
                    ->schema([
                        Select::make('user_id')
                            ->relationship(name: 'mentor', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query) => $query->where('role', 'mentor'))
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
                            ->options([
                                'buka' => 'Buka',
                                'tutup' => 'Tutup',
                            ]),
                        Radio::make('status_kuota')
                            ->options([
                                'tersedia' => 'Tersedia',
                                'penuh' => 'Penuh',
                            ]),
                        Radio::make('status_pelaksanaan')
                            ->options([
                                'selesai' => 'Selesai',
                                'proses' => 'Proses',
                                'batal' => 'Batal',
                            ])
                    ])
                    ->hiddenOn('create'),
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
                    ->dateTime()
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
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])->tooltip('Actions')
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
        return static::getModel()::count();
    }
}
