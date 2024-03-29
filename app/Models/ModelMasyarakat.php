<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelMasyarakat extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory;

    public $timestamps = false;
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
