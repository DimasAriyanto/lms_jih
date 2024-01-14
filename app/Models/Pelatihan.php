<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'pelatihan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'image_url',
        'tanggal_pelaksanaan',
        'tempat_pelaksanaan',
        'jam_mulai',
        'jam_selesai',
        'jenis_kuota',
        'kuota',
        'jenis_pelaksanaan',
        'status_selesai',
        'status_acc',
        'kategori_id',
        'user_id',
        'is_aktif',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'katogori_id', 'id');
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
