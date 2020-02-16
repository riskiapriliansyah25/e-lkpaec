<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribusisoallatihan extends Model
{
    protected $table = 'distribusisoallatihan';
    protected $guarded = [''];

    public function soallatihan()
    {
        return $this->belongsTo('App\Soallatihan', 'id_soal');
    }
    public function Kelas()
    {
        return $this->belongsTo('App\Coba', 'id_kelas');
    }
    public function jawabUser()
  {
  	return $this->belongsTo('App\Jawablatihan', 'id_soal', 'id_soal'); //->where('id_user', Auth::user()->id);
  }
  public function user()
  {
      return $this->belongsTo('App\User', 'id_user');
  }
}
