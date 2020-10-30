<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoGrapik extends Model
{
	protected $appends = ['thumbnail'];

    public function kategoriInfo()
    {
        return $this->belongsTo(KategoriInfo::class);
    }

    public function getThumbnailAttribute($value)
    {
    	if ($value) {
    		return $value;
    	}

    	return 'files/infografik/' . str_replace('public/', null, $this->gambar);
    }
}
