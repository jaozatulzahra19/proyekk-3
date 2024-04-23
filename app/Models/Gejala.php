<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodeGejala',
        'gejala'
    ];

    public function rules()
    {
        return $this->hasMany(Rule::class, 'kodeGejala', 'kodeGejala');
    }
}
