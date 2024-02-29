<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Filament\Resources\PendaftaranResource\RelationManagers;
use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationLabel = 'Pendaftaran';

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    protected static ?string $navigationGroup = 'Pelatihan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                // 'pelatihan.nama',
                Group::make('pelatihan.nama')
                    ->orderQueryUsing(fn (Builder $query, string $direction) => $query->orderBy('pelatihan_id', $direction))
                    ->collapsible(),
            ])
            ->defaultGroup('pelatihan.nama')
            ->columns([
                TextColumn::make('No')
                    ->rowIndex(),
                TextColumn::make('peserta.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tanggal_pendaftaran')
                    ->dateTime()
                    ->sortable()
                    ->summarize(Count::make()
                        ->label('Jumlah peserta')),
                // 3`
                TextColumn::make('tanggal_pembayaran')
                    // ->dateTime()
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => $state !== 'Belum Membayar' ? 'success' : 'danger')
                    ->default('Belum Membayar'),
                TextColumn::make('metode_pembayaran')
                    ->badge()
                    ->color(fn ($state) => $state !== 'Belum Membayar' ? 'success' : 'danger')
                    ->default('Belum Membayar'),
            ])
            // ->inverseRelationship('peserta')
            ->filters([
                SelectFilter::make('pelatihan_id')
                    ->label('Pelatihan')
                    ->options(fn (): array => Pelatihan::query()->pluck('nama', 'id')->all()),
                Filter::make('tanggal_pendaftaran')
                    ->form([
                        DatePicker::make('from')
                            ->label('Tanggal mulai pendaftaran'),
                        DatePicker::make('until')
                            ->label('Tanggal akhir pendaftaran'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_pendaftaran', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_pendaftaran', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['from'] ?? null) {
                            $indicators[] = Indicator::make('Created from ' . Carbon::parse($data['from'])->toFormattedDateString())
                                ->removeField('from');
                        }

                        if ($data['until'] ?? null) {
                            $indicators[] = Indicator::make('Created until ' . Carbon::parse($data['until'])->toFormattedDateString())
                                ->removeField('until');
                        }

                        return $indicators;
                    }),
                Filter::make('tanggal_pembayaran')
                    ->form([
                        DatePicker::make('from')
                            ->label('Tanggal mulai pembayaran'),
                        DatePicker::make('until')
                            ->label('Tanggal akhir pembayaran'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_pembayaran', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_pembayaran', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['from'] ?? null) {
                            $indicators[] = Indicator::make('Created from ' . Carbon::parse($data['from'])->toFormattedDateString())
                                ->removeField('from');
                        }

                        if ($data['until'] ?? null) {
                            $indicators[] = Indicator::make('Created until ' . Carbon::parse($data['until'])->toFormattedDateString())
                                ->removeField('until');
                        }

                        return $indicators;
                    })
            ])
            ->filtersFormColumns(3)
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->role !== 'admin') {
            return parent::getEloquentQuery()->where('user_id', auth()->id())->count();
        }

        return static::getModel()::count();
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Jumlah pelatihan diikuti';
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->role !== 'admin') {
            return parent::getEloquentQuery()->where('user_id', auth()->id());
        }

        return parent::getEloquentQuery();
    }
}
