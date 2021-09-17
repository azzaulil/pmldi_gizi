<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_makanan',
        'harga',
        'porsi',
        'label',
        'foto_makanan',
        'id_kantin',
    ];

    public function nutrisiMakanan() {
        return $this->hasMany('App\Models\NutrisiMakanan', 'id_makanan');
    }
}
