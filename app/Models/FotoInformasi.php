<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoInformasi extends Model
{
    use HasFactory;

    protected $table = 'foto_informasi';
    public $timestamps = false;
    protected $guarded = [];
}
