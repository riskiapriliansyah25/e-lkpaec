<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailsoal extends Model
{
    protected $table = 'detailsoal';
    protected $guarded = [''];

    public function checkJawab()
	{
		return $this->belongsTo('App\Jawab', 'id', 'no_soal_id')->where('id_user', auth()->user()->id);
	}
}
