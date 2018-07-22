<?php  

namespace App\Presenters;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\HtmlString;

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
		$author = $this->comment->name;

		if (!is_null(auth()->user()) && auth()->user()->id == 1) {
			$author .= $this->comment->approved
							? ' <b>(Aprobado)</b>'
							: ' <b>(No Aprobado)</b>';
		} 

		return new HtmlString($author);
	}

	public function getPublishedDate(){

		return $this->comment->created_at->formatLocalized('%d de %B del %Y');

	}

	public function approved(){
		return $this->comment->approved == 1
									? 'Aprobado'
									: 'No aprobado';
	}

	public function post(){

		if ($this->comment->post_id > 0) {

			$post = $this->comment->post;

		} else {
			$post = $this->comment->comment->post;
		}

		return new HtmlString('<a target="_blank" href="'.route('frontend.post', $post->slug).'">'.$post->title.'</a>');

	}

}