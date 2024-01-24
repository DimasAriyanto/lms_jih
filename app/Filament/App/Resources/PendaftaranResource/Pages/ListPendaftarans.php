<?php

namespace App\Filament\App\Resources\PendaftaranResource\Pages;

use App\Filament\App\Resources\PendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendaftarans extends ListRecords
{
    protected static string $resource = PendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
