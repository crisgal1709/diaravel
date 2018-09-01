<?php  

namespace App\Traits;

trait HasPresenter{

	public function present(){

		$model = last(explode('\\', self::class));

		$presenter = '\\App\\Presenters\\' . $model . 'Presenter';

		if (!class_exists($presenter)) {
			throw new \InvalidArgumentException(sprintf('Presenter "%s" Not exists', $presenter));
		}

		return new $presenter($this);
	}

}
