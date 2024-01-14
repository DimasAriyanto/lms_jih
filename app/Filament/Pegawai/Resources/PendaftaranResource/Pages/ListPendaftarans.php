<?php

namespace App\Filament\Pegawai\Resources\PendaftaranResource\Pages;

use App\Filament\Pegawai\Resources\PendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendaftarans extends ListRecords
{
    protected static string $resource = PendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
