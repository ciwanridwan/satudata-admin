<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    public function galeries()
    {
        return $this->belongsTo(Galery::class);
    }
}
