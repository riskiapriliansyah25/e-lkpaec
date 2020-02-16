<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailsoallatihan extends Model
{
    protected $table = 'detailsoallatihan';
    protected $guarded = [''];

    public function checkJawab()
	{
		return $this->belongsTo('App\Jawablatihan', 'id', 'no_soal_id')->where('id_user', auth()->user()->id);
	}
}
