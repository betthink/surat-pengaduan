<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKatakunci extends Model
{
    use HasFactory;
    public $timestamps = false;
    use HasFactory;
    protected $table = 'kata_kunci';
    protected $fillable = [
        'kata',
        'kategori',
        'keterangan',
    ];
}
