<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    public function gambars()
    {
        return $this->hasMany(Gambar::class);
    }
}
