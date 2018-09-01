<?php  

namespace App\Presenters;

use Illuminate\Support\HtmlString;

class AboutPresenter {
	private $about;


	function __construct($about)
	{
		$this->about = $about;
	}

	private function send($data){
		return new HtmlString($data);
	}

	public function title(){
		return $this->send($this->about->title);
	}

	public function subtitle(){
		return $this->send($this->about->subtitle);
	}

	public function content(){
		return $this->send($this->about->content);
	}

	public function important(){
		return $this->send($this->about->important);
	}

	public function image(){
		$archive = $this->about->archives->first();
		if (!is_null($archive)) {
			
			$img = '<img src="' . asset($archive->route) . '" alt="" class="img-responsive">';

		} else {
			$img = '<img src="'.asset('front/images/resource/services.jpg').'" alt="" />';
		}

		return $this->send($img);
	}

}