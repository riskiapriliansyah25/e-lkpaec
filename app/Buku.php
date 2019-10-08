<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $guarded = [''];

    public function Siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
