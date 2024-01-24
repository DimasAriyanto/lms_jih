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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Radio::make('status_pembayaran')
                    ->options([
                        'sudah' => 'Sudah',
                        'belum' => 'Belum',
                    ])
                    ->inline()
                    ->inlineLabel(false),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('pelatihan.nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tanggal_pendaftaran')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status_pembayaran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'belum' => 'warning',
                        'sudah' => 'success',
                    })
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
}
