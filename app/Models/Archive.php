<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
