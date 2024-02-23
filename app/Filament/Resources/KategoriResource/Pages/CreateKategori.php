<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use App\Filament\Resources\KategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\User;
use App\Notifications\PelatihanNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class CreateKategori extends CreateRecord
{
    protected static string $resource = KategoriResource::class;

    protected function afterCreate(): void
    {
        /** @var Order $order */
        $order = $this->record;

        // /** @var User $user */
        // $mentor = User::where('role', 'mentor')->get();
        // $peserta = User::where('role', 'pegawai')->orWhere('role', 'umum')->get();

        // Notification::make()
        //     ->title('Anda memiliki jadwal pelatihan baru')
        //     ->icon('heroicon-o-shopping-bag')
        //     ->sendToDatabase($mentor);

        // Notification::make()
        //     ->title('Mari ikuti pelatihan baru')
        //     ->icon('heroicon-o-shopping-bag')
        //     ->sendToDatabase($peserta);

        // FacadesNotification::send($mentor, new PelatihanNotification());
    }
}
