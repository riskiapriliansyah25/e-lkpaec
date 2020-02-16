<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';
    protected $guarded = [''];

    public function buku()
    {
        return $this->belongsTo('App\Buku', 'id_buku');
    }
}
