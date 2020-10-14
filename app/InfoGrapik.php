<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoGrapik extends Model
{
    public function kategoriInfo()
    {
        return $this->belongsTo(KategoriInfo::class);
    }
}
