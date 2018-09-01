<?php  

namespace App\Presenters;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\HtmlString;


class PostPresenter{
	private $post;


	public function __construct(Post $post)
	{
		# code...
		$this->post = $post;

		Carbon::setLocale('en');
        setlocale(LC_TIME, 'en.UTF-8');
	}


	public function getCategories(){

		if ($this->post->categories->count() > 0) {
			$a = '<i class="fa fa-list-alt"></i> ';
			$c = 1;
			$cont = $this->post->categories->count();
			foreach ($this->post->categories as $category) {
				$a .= '<a href="'.route('frontend.category', $category->slug).'">'.$category->name.'</a>';

				if ($c < $cont) {
					$a .= ', ';
				}

				$c++;
			}

			return new HtmlString($a);
		}

		return 'No Categorie';
	}

	public function getTags(){

		if ($this->post->tags->count() > 0) {
			$a = '<i class="fa fa-tags"></i> ';
			$c = 1;
			$cont = $this->post->tags->count();
			foreach ($this->post->tags as $tag) {
				$a .= '<a href="'.route('frontend.tag', $tag->slug).'">'.$tag->name.'</a>';

				if ($c < $cont) {
					$a .= ', ';
				}

				$c++;
			}

			return new HtmlString($a);
		}

		return '';
	}

	public function getPublishedDate(){

		return $this->post->created_at->formatLocalized('%d of %B of %Y');

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

			return new HtmlString('<img src="'.asset($this->post->archives->first()->route).'" alt="'.$this->post->title.'" class="img-responsive" style="width: 90%; height: auto">');

		} else {

			return new HtmlString('<img src="/front/images/resource/news-2.jpg" alt=""/>');

		}
	}

	public function body(){
		return new HtmlString($this->post->body);
	}

	public function comments(){
		$numComments= $this->post->comments->count();

		if ($numComments == 0) {
			return 'There are no comments. Be the first to review.';
		} else if($numComments == 1){
			return '1 Comment';
		} else {
			return $numComments . ' Comments';
		}
	}

	public function status(){
		if ($this->resolveStatus()) {
			$a = ' <a href="'.route('posts.publishe', [$this->post->id]).'" class="btn btn-warning btn-xs" title="Mark as not published">
                      <i class="fa fa-remove"></i>
                   </a>';
		} else {
			$a = '<a href="'.route('posts.publishe', [$this->post->id]) .'" class="btn btn-success btn-xs" title="Publish">
                     <i class="fa fa-check"></i>
                  </a>';
		}

		return new HtmlString($a);
	}

	public function resolveStatus($letters = false){
		if (!$letters) {
			return $this->post->published;
		}

		return $this->post->published
						? 'Published'
						: 'Not Published';
	}

}


