<?php  

namespace App\Traits;

trait Slugable{
		
	public static function bootSlugable(){

		static::creating(function($model){
			$model->slug = self::resolveSlug($model);
		});

		static::updating(function($model){
			$model->slug = self::resolveSlug($model);
		});
	}


	public static function resolveSlug($model){
		return str_slug(
				property_exists($model, 'title')
					? $model->title
					: $model->name
			);
	}

}