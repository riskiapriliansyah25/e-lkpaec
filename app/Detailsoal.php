<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailsoal extends Model
{
    protected $table = 'detailsoal';
    protected $guarded = [''];

    public function Materi()
    {
        return $this->hasOne(Materi::class);
    }
}
