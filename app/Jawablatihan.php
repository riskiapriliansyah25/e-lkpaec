<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawablatihan extends Model
{
    protected $table = 'jawablatihan';
    protected $guarded = [''];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function detailSoalLatihan()
    {
        return $this->belongsTo('App\Detailsoallatihan', 'no_soal_id');
    }
}
