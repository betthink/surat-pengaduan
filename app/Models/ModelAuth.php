<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelAuth extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;
    protected $table = 'admin';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'username',
        'password',
        'level',
        'status',
    ];
}
