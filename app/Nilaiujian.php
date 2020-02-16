<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilaiujian extends Model
{
    protected $table = "nilaiujian";
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function soal()
    {
        return $this->belongsTo('App\Soal', 'id_soal');
    }
}
