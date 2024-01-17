<?php

namespace App\Filament\Mentor\Resources;

use App\Filament\Mentor\Resources\PelatihanResource\Pages;
use App\Filament\Mentor\Resources\PelatihanResource\RelationManagers;
use App\Models\Pelatihan;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PelatihanResource extends Resource
{
    protected static ?string $model = Pelatihan::class;

    protected static ?string $navigationLabel = 'Pelatihan';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        // dd(auth()->id());
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
                            ->autosize()
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
                            ->required(),
                        TimePicker::make('jam_selesai')
                            ->required(),
                    ])->columns(2),

                Section::make('Status Pelaksanaa')
                    ->schema([
                        Radio::make('status_selesai')
                            ->options([
                                'belum' => 'Belum',
                                'selesai' => 'Selesai',
                            ]),
                    ])->visibleOn('view'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                ImageColumn::make('image_url')
                    ->label('Photo'),
                TextColumn::make('nama')
                    ->sortable()
                    ->searchable()
                    ->translateLabel(),
                TextColumn::make('tanggal_pelaksanaan')
                    ->date()
                    ->sortable(),
                TextColumn::make('status_selesai')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'belum' => 'warning',
                        'sudah' => 'success',
                    }),
                TextColumn::make('status_acc')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ditolak' => 'danger    ',
                        'menunggu' => 'warning',
                        'sudah' => 'success',
                    }),
            ])
            ->filters([
                SelectFilter::make('jenis_kuota')
                    ->options([
                        'limited' => 'Limited',
                        'unlimited' => 'Unlimited'
                    ]),
                SelectFilter::make('status_selesai')
                    ->options([
                        'sudah' => 'Sudah',
                        'belum' => 'Belum'
                    ]),
                SelectFilter::make('status_acc')
                    ->options([
                        'ditolak' => 'Ditolak',
                        'menunggu' => 'Menunggu',
                        'disetujui' => 'Disetujui',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            //
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
}
