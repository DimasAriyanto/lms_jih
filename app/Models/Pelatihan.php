<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'status_pelaksanaan',
        'kategori_id',
        'user_id',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'katogori_id', 'id');
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function peserta(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'peserta');
    }

    public function sertifikat(): HasMany
    {
        return $this->hasMany(Sertifikat::class, 'pelatihan_id', 'id');
    }
}
