<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soallatihan extends Model
{
    protected $table = 'soallatihan';
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
    public function jawablatihan()
    {
        return $this->belongsTo('App\Jawablatihan', 'id_soal');
    }
    public function detailSoalLatihan()
    {
        return $this->hasMany('App\Detailsoallatihan', 'id_soal');
    }
}
