<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribusisoal extends Model
{
    protected $table = 'distribusisoal';
    protected $guarded = [''];

    public function soal()
    {
        return $this->belongsTo('App\Soal', 'id_soal');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id_siswa');
    }
    public function jawabUser()
  {
  	return $this->belongsTo('App\Jawab', 'id_soal', 'id_soal'); //->where('id_user', Auth::user()->id);
  }
}
