<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PendaftaranResource\Pages;
use App\Filament\App\Resources\PendaftaranResource\RelationManagers;
use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use Carbon\Carbon;
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
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
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
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
