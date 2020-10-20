<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $appends = ['size_files'];

    public function getSizeFilesAttribute($value)
	{
		if (!empty($value)) {
			return $value;
		}

		$file = public_path('storage/files/' . $this->file);
		if (file_exists($file)) {
			$size = filesize($file);

			if ($size >= 1073741824) {
				$size = number_format($size / 1073741824, 2) . 'GB';
			} elseif ($size >= 1048576) {
				$size = number_format($size / 1048576, 2) . ' MB';
			} elseif ($size >= 1024) {
				$size = number_format($size / 1024, 2) . ' KB';
			} elseif ($size > 1) {
				$size = $size . ' bytes';
			} elseif ($size == 1) {
				$size = $size . ' byte';
			} else {
				$size = '0 bytes';
			}

			$update = self::where('id', $this->id)->first();
			$update->size_files = $size;
			$update->update();

			return $size;
		}
	}
}
