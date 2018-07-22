<?php  


namespace App\Cubic;

use Illuminate\Broadcasting\BroadcastManager;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;


class CubicServiceProvider extends ServiceProvider
{

	public function boot(BroadcastManager $broadcastManager)
	{
		$broadcastManager->extend('cubic', function (Application $app, array $config) {
			return new Cubic;
		});
	}
}

