<?php  

namespace App\Presenters;

use App\Models\Comment;
use Carbon\Carbon;

class CommentPresenter{
	private $comment;


	public function __construct(Comment $comment)
	{
		# code...
		$this->comment = $comment;


		Carbon::setLocale('es');
        setlocale(LC_TIME, 'es_ES.UTF-8');
	}

	public function authorName(){
		return $this->comment->name;
	}

	public function getPublishedDate(){

		return $this->comment->created_at->formatLocalized('%d de %B del %Y');

	}

	public function approved(){
		return $this->comment->approved == 1
									? 'Aprobado'
									: 'No aprobado';
	}

}