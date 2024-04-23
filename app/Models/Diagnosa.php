<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $table = 'diagnosas';
    protected $guarded = [];

    use HasFactory;

    public function penyakits()
    {
        return $this->belongsTo(Penyakit::class, 'hasil', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
