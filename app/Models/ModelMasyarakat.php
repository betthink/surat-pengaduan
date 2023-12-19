<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMasyarakat extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'masyarakat'; 
    protected $fillable = [
        'nama',
        'username',
        'password',
        'alamat',
        'tanggal_lahir',
        'tempat_lahir',
        'nik',
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];
}
