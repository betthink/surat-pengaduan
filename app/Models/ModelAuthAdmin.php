<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelAuthAdmin extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory;
    public $timestamps = false;
    protected $table = 'admin';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'level',
        'status',
    ];
}
