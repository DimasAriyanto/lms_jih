<?php

namespace App\Filament\App\Resources\PelatihanResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class PendaftaranRelationManager extends RelationManager
{
    protected static string $relationship = 'pendaftaran';

    protected static bool $shouldSkipAuthorization = true;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship(name: 'peserta', titleAttribute: 'name'),
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

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('tanggal_pendaftaran')
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('peserta.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pendaftaran')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('tanggal_pembayaran')
                    ->label('Status Pembayaran')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->default(0),
                Tables\Columns\TextColumn::make('tanggal_pembayaran')
                    ->badge()
                    ->color(fn ($state) => $state !== 'Belum Membayar' ? 'success' : 'danger')
                    ->default('Belum Membayar'),
                Tables\Columns\TextColumn::make('metode_pembayaran')
                    ->badge()
                    ->color(fn ($state) => $state !== 'Belum Membayar' ? 'success' : 'danger')
                    ->default('Belum Membayar'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
