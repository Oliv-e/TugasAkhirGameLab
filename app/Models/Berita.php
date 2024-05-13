<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = "berita";
    protected $fillable = [
        "id_penulis",
        "id_kategori",
        "gambar",
        "judul",
        "deskripsi",
    ];

    public function penulis()
    {
        return $this->belongsTo('App\Models\User', 'id_penulis');
    }
    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }
}
