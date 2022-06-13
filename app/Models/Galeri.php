<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function konten_galeri()
    {
        return $this->hasMany(KontenGaleri::class, 'galeri_id');
    }
}
