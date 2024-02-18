<?php

namespace App\Filament\Resources\PelatihanResource\Pages;

use App\Filament\App\Resources\PelatihanResource as AppPelatihanResource;
use App\Filament\Resources\PelatihanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use App\Models\User;
use App\Notifications\MentorNotification;
use App\Notifications\PesertaNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class CreatePelatihan extends CreateRecord
{
    protected static string $resource = PelatihanResource::class;

    protected function afterCreate(): void
    {
        /** @var Order $order */
        $pelatihan = $this->record;

        /** @var User $user */
        $mentor = User::where('role', 'mentor')->where('id', $pelatihan->user_id)->first();
        $peserta = User::where('role', 'pegawai')->orWhere('role', 'umum')->get();

        Notification::make()
            ->title('Anda memiliki jadwal pelatihan terbaru')
            ->icon('uiw-date')
            ->body("**{$pelatihan->nama} tanggal {$pelatihan->tanggal_pelaksanaan}.**")
            ->actions([
                Action::make('View')
                    ->url(AppPelatihanResource::getUrl('view', ['record' => $pelatihan])),
            ])
            ->sendToDatabase($mentor);

        FacadesNotification::send($mentor, new MentorNotification($pelatihan));

        Notification::make()
            ->title('Yuk ikuti pelatihan terbaru')
            ->icon('uiw-date')
            ->body("**{$pelatihan->nama} tanggal {$pelatihan->tanggal_pelaksanaan}.**")
            ->actions([
                Action::make('View')
                    ->url('course'),
            ])
            ->sendToDatabase($peserta);

        FacadesNotification::send($mentor, new PesertaNotification());
    }
}
