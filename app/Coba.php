<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coba extends Model
{
    protected $table = "kelas";
    protected $guarded = [""];

    public function Instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
    public function Siswa()
    {
       return $this->hasMany('App\Siswa', 'kelas_id');
    }
}
