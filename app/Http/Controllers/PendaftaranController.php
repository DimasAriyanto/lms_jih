<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function create()
    {
        $pelatihan = Pelatihan::all();

        $pelatihan->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->nama,
                'image_url' => Storage::url($item->image_url),
                'deskripsi' => $item->deskripsi,
                'harga' => $item->harga,
            ];
        });
        // dd($pelatihan);
        return view('course', compact('pelatihan'));
    }

    public function store(Request $request)
    {
        // dd($request->pelatihan_id, Auth::user()->id, Carbon::now());
        try {
            Pendaftaran::create([
                'pelatihan_id' => $request->pelatihan_id,
                'user_id' => Auth::user()->id,
                'tanggal_pendaftaran' => Carbon::now(),
                'status_pembayaran' => 'belum',
            ]);

            return redirect()->route('course.create')->with('success', 'Berhasil mengikuti pelatihan');
        } catch (ModelNotFoundException $e) {
            // dd($e);
            return redirect()->back()->with('error', 'Pendaftaran gagal' . $e->getMessage());
        }
    }
}
