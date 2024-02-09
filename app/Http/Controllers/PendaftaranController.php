<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use Exception;
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
        return view('course', compact('pelatihan'));
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $pendaftaran = Pendaftaran::where([
                'user_id' => $user->id,
                'pelatihan_id' => $request->pelatihan_id,
            ])->exists();
            if (!$pendaftaran) {
                if ($user->role === 'pegawai' || $user->role === 'umum') {
                    Pendaftaran::create([
                        'pelatihan_id' => $request->pelatihan_id,
                        'user_id' => Auth::user()->id,
                    ]);

                    return to_route('course.create')->with('success', 'Berhasil mengikuti pelatihan');
                }

                return redirect()->back()->with('error', 'Hanya pegawai dan umum yang boleh mendaftar');
            }
            return redirect()->back()->with('error', 'Tidak boleh mendaftar lebih dari sekali');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('error', $e->getMessage());
        }
    }
}
