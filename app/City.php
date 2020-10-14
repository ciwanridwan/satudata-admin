<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function provinces()
    {
        return $this->belongsTo(Province::class);
    }
}
