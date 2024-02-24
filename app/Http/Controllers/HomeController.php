<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $jumlah_pelatihan = Pelatihan::count();
        $jumlah_pendaftar = Pendaftaran::count();
        $jumlah_mentor = User::where('role', 'mentor')->count();

        $pelatihan = Pelatihan::latest()->limit(7)->get();
        $data_pelatihan = $pelatihan->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->nama,
                'image_url' => $item->image_url,
                'status_pendaftaran' => $item->status_pendaftaran,
                'tempat_pelaksanaan' => $item->tempat_pelaksanaan ?? $item->link_online,
                'tanggal_pelaksanaan' => $item->tanggal_pelaksanaan,
                'jam_mulai' => $item->jam_mulai,
                'jam_selesai' => $item->jam_selesai,
                'harga' => $item->harga,
            ];
        });

        return view('home', compact('jumlah_pelatihan', 'jumlah_pendaftar', 'jumlah_mentor', 'data_pelatihan'));
    }
}
