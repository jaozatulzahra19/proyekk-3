<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $table = 'rules';
    protected $guarded = [];

    public function penyakits()
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit', 'id');
    }

    public function gejalas()
    {
        return $this->belongsTo(Gejala::class, 'daftargejala', 'id');
    }

    public function manyGejala()
    {
        return $this->hasMany(Gejala::class, 'id', 'daftargejala');
    }
}