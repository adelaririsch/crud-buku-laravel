<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Buku extends Model
{
    protected $guarded = []; //membuka akses agar semua kolom bisa diisi

    public function kategori(): BelongsTo 
    {
        return $this->belongsTo(Kategori::class);
    }

    public function penerbit(): BelongsTo 
    {
        return $this->belongsTo(Penerbit::class);
    }
    
}
