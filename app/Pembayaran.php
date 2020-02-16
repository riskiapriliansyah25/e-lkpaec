<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $guarded = [''];

    public function paket()
    {
        return $this->belongsTo('App\Paket', 'id_paket');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id_siswa');
    }
}
