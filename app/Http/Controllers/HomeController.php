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

        $data_pelatihan = Pelatihan::latest()->limit(7)->get();

        return view('home', compact('jumlah_pelatihan', 'jumlah_pendaftar', 'jumlah_mentor', 'data_pelatihan'));
    }
}
