<?php

namespace App\Filament\Mentor\Resources\PelatihanResource\Pages;

use App\Filament\Mentor\Resources\PelatihanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePelatihan extends CreateRecord
{
    protected static string $resource = PelatihanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
