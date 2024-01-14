<?php

namespace App\Filament\Mentor\Resources\PelatihanResource\Pages;

use App\Filament\Mentor\Resources\PelatihanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPelatihans extends ListRecords
{
    protected static string $resource = PelatihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
