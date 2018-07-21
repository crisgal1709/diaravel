<?php  

namespace App\Traits;

trait UserId {


	public static function bootUserId(){

		static::creating(function($model){
			$model->user_id = !is_null(auth()->user()) ? auth()->user()->id : 1;
		});
	}

	/**
	 * UserId belongs to Usuario.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author()
	{
		// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
		return $this->belongsTo(\App\User::class, 'user_id', 'id');
	}

	//Retorna el nombre del usuario para presentarlo en pantalla más ameno
	public function presentNameAuthor(){
		return $this->usuario->name;
	}


}