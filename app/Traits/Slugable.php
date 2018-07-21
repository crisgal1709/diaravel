<?php  

namespace App\Traits;

trait Slugable{
		
	public static function bootSlugable(){

		static::creating(function($model){
			$model->slug = str_slug(
				property_exists($model, 'title')
					? $model->title
					: $model->name
			);
		});
	}

}