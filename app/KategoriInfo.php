<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriInfo extends Model
{
    public function infograpik()
    {
        return $this->hasMany(InfoGrapik::class);
    }
}
