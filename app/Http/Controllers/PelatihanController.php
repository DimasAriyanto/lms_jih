<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihan = Pelatihan::all();

        $data_pelatihan = $pelatihan->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->nama,
                'image_url' => Storage::url($item->image_url),
                'status_pendaftaran' => $item->status_pendaftaran,
                'tempat_pelaksanaan' => $item->tempat_pelaksanaan ?? $item->link_online,
                'tanggal_pelaksanaan' => $item->tanggal_pelaksanaan,
                'jam_mulai' => $item->jam_mulai,
                'jam_selesai' => $item->jam_selesai,
                'harga' => $item->harga,
            ];
        });
        return view('pendaftaran', compact('data_pelatihan'));
    }

    public function show(Pelatihan $pelatihan)
    {
        //
    }
}
