<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    protected $table = "instruktur";
    protected $guarded = [""];

    public function Coba()
    {
        return $this->hasMany(Coba::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
