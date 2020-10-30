<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriGalery extends Model
{
    protected $primaryKey = 'id';
    
    protected $tables = 'kategori_galeries';
    
    public function galeries()
    {
        return $this->hasMany(Galery::class);
    }
}
