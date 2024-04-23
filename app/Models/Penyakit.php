<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodePenyakit',
        'penyakit'
    ];

    public function rules()
    {
        return $this->hasMany(Rule::class, 'kodePenyakit', 'kodePenyakit');
    }
}
