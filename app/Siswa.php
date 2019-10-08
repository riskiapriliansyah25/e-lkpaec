<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $guarded = [""];

    public function Paket()
    {
        return $this->belongsTo(Paket::class);
    }

    Public function Buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function Coba()
    {
        return $this->belongsTo('App\Coba', 'kelas_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
