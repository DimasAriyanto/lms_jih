<?php

namespace App\Filament\Pegawai\Resources\PendaftaranResource\Pages;

use App\Filament\Pegawai\Resources\PendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPendaftaran extends EditRecord
{
    protected static string $resource = PendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
