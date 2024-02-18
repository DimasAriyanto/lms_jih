<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelatihan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pelatihan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'image_url',
        'tanggal_pelaksanaan',
        'tempat_pelaksanaan',
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
        'tanggal_pelaksanaan' => 'date',
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
}
