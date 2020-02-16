<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';
    protected $guarded = [''];

    public function Buku()
    {
        return $this->belongsTo('App\Buku', 'buku_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function jawab()
    {
        return $this->belongsTo('App\Jawab', 'id_soal');
    }
    public function detailSoal()
    {
        return $this->hasMany('App\Detailsoal', 'id_soal');
    }
}
