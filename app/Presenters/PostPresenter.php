<?php  

namespace App\Presenters;

use App\Models\Post;
use Illuminate\Support\HtmlString;


class PostPresenter{
	private $post;


	public function __construct(Post $post)
	{
		# code...
		$this->post = $post;
	}


	public function getCategories(){

		if ($this->post->categories->count() > 0) {
			return implode(',', $this->post->categories->pluck('name')->toArray());
		}

		return 'Sin categoría';
	}

	public function getPublishedDate(){

		return $this->post->created_at->format('Y-m-d');

	}

	public function authorName(){
		return $this->post->author->name;
	}

	public function excerpt($limit = false){
		if (!$limit) {
			return $this->post->excerpt;
		}

		return substr($this->post->excerpt, 0, $limit) . '...';
	}

	public function thumbnail(){
		if ($this->post->archives->count() > 0){

			return new HtmlString('<img src="'.$this->post->archives->first()->route.'" alt="'.$this->post->title.'" class="img-responsive" style="width: 90%; height: auto">');

		} else {

			return new HtmlString('<img src="/front/images/resource/news-8.jpg" alt=""/>');

		}
	}

	public function body(){
		return new HtmlString($this->post->body);
	}

}


