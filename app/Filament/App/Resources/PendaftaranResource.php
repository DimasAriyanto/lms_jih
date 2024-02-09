<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PendaftaranResource\Pages;
use App\Filament\App\Resources\PendaftaranResource\RelationManagers;
use App\Models\Pendaftaran;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationLabel = 'Pendaftaran';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('pelatihan_id')
                    ->relationship(name: 'pelatihan', titleAttribute: 'nama'),
                DatePicker::make('tanggal_pendaftaran')
                    ->native(false),
                DatePicker::make('tanggal_pembayaran')
                    ->native(false)
                    ->required(),
                TextInput::make('metode_pembayaran')
                    ->numeric()
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')
                    ->rowIndex(),
                TextColumn::make('pelatihan.nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tanggal_pendaftaran')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tanggal_pembayaran')
                    ->badge()
                    ->color(fn ($state) => $state !== 'Belum Membayar' ? 'success' : 'danger')
                    ->default('Belum Membayar'),
                TextColumn::make('metode_pembayaran')
                    ->badge()
                    ->color(fn ($state) => $state !== 'Belum Membayar' ? 'success' : 'danger')
                    ->default('Belum Membayar'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\ActionGroup::make([
                // ])
                //     ->button()
                //     ->label('Actions')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'view' => Pages\ViewPendaftaran::route('/{record}'),
            'view-pelatihan' => Pages\ViewPendaftaranPelatihan::route('/{record}/pelatihan'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }

    // public static function getRecordSubNavigation(Page $page): array
    // {
    //     return $page->generateNavigationItems([
    //         Pages\ViewPendaftaranPelatihan::class,
    //     ]);
    // }

    public static function getNavigationBadge(): ?string
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id())->count();
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }
}
