<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = "paket";
    protected $guarded = [""];

    public function Siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
