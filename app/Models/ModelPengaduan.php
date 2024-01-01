<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPengaduan extends Model
{
    use HasFactory;
    public $timestamps = false;
    use HasFactory;
    protected $table = 'laporan';
    protected $fillable = [
        'nama_terlapor',
        'judul_perkara',
        'deskripsi',
        'status',
        'hasil',
        'tanggal',
        'rujukan',
        'id_user',
    ];
}
