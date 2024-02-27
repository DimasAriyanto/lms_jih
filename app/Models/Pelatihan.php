<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Pelatihan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pelatihan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'image_url',
        'modul_pelatihan',
        'tanggal_pelaksanaan',
        'tipe_pelaksanaan',
        'tempat_pelaksanaan',
        'link_online',
        'jam_mulai',
        'jam_selesai',
        'jenis_pelaksanaan',
        'kuota',
        'tanggal_mulai_pendaftaran',
        'tanggal_akhir_pendaftaran',
        'harga',
        'diskon',
        'status_pendaftaran',
        'status_kuota',
        'status_pelaksanaan',
        'kategori_id',
        'user_id',
    ];

    protected $casts = [
        // 'tanggal_pelaksanaan' => 'date:Y-m-d',
        'tanggal_mulai_pendaftaran' => 'datetime',
        'tanggal_akhir_pendaftaran' => 'datetime',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'pelatihan_id', 'id');
    }

    public function sertifikat(): HasMany
    {
        return $this->hasMany(Sertifikat::class, 'pelatihan_id', 'id');
    }

    public function wishlist(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'pelatihan_id', 'id');
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class, 'pelatihan_id', 'id');
    }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image_url, 'http');

        return ($isUrl) ? $this->image_url : Storage::disk('public')->url($this->image_url);
    }

    public function getTanggalPendaftaran() {
        return \Carbon\Carbon::parse($this->tanggal_pelaksanaan)->locale('id')->isoFormat('dddd, D MMMM YYYY');
    }

    public function getTanggalMulai()
    {
        return \Carbon\Carbon::parse($this->jam_mulai)->format('H:i');
    }

    public function getTanggalSelesai()
    {
        return \Carbon\Carbon::parse($this->jam_selesai)->format('H:i');
    }
}
