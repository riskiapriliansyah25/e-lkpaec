<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribusisoal extends Model
{
    protected $table = 'distribusisoal';
    protected $guarded = [''];

    public function Soal()
    {
        return $this->belongsTo(Soal::class);
    }
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
