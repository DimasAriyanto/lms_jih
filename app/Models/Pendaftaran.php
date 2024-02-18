<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendaftaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'pelatihan_id',
        'user_id',
        'tanggal_pendaftaran',
        'tanggal_pembayaran',
        'total_pembayaran',
        'metode_pembayaran',
    ];

    protected $casts = [
        'tanggal_pendaftaran' => 'datetime',
        'tanggal_pembayaran' => 'datetime',
        'total_pembayaran' => 'float',
    ];

    public function peserta(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pelatihan(): BelongsTo
    {
        return $this->belongsTo(Pelatihan::class, 'pelatihan_id', 'id');
    }
}
