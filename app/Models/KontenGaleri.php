<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenGaleri extends Model
{
    use HasFactory;

    protected $table = 'konten_galeri';
    public $timestamps = false;
    protected $guarded = [];
}
