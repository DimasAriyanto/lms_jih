<?php

namespace App\Filament\App\Resources\PelatihanResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PendaftaranRelationManager extends RelationManager
{
    protected static string $relationship = 'pendaftaran';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship(name: 'peserta', titleAttribute: 'name'),
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

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('tanggal_pendaftaran')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('peserta.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pendaftaran')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_pembayaran')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
