<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribusimateri extends Model
{
    protected $table = "distribusimateri";
    protected $guarded = [""];

    public function kelas()
    {
        return $this->belongsTo('App\Coba', 'kelas_id');
    }
    public function materi()
    {
        return $this->belongsTo('App\Materi', 'materi_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
