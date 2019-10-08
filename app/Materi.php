<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "materi";
    protected $guarded = [""];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function Latihan()
    {
        return $this->hasMany(Latihan::class);
    }
}
