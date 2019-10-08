<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';
    protected $guarded = [''];

    public function Materi()
    {
        return $this->belongsTo('App\Materi', 'materi_id');
    }
    public function Buku()
    {
        return $this->belongsTo('App\Buku', 'buku_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Detailsoal()
    {
        return $this->hasMany('App\Detailsoal', 'soal_id');
    }

}
