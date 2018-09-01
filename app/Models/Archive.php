<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Archive extends Model
{

	/**
	 * Fields that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'route'];

    public function archivable(){
    	return $this->morphTo();
    }

    public static function boot(){
    	parent::boot();

    	static::deleting(function($archive){
    		Storage::disk('public')->delete($archive->route);
    	});
    }
}
