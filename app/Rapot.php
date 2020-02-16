<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapot extends Model
{
    protected $table = 'rapot';
    protected $guarded = [''];
    
    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id_siswa');
    }
    public function kriteria()
    {
        return $this->belongsTo('App\Kriteria', 'id_kriteria');
    }
}
