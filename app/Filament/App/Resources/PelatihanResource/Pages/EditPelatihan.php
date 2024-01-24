<?php

namespace App\Filament\App\Resources\PelatihanResource\Pages;

use App\Filament\App\Resources\PelatihanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPelatihan extends EditRecord
{
    protected static string $resource = PelatihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
