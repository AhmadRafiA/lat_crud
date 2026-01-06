<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    protected $fillable = [
        'user_id',
        'nama_barang',
        'harga',
        'stok',
        'expired_at',
        'garansi'
    ];

    protected $casts = [
        'expired_at' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}