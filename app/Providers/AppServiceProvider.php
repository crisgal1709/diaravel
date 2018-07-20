<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(255);

        app('view')->composer(['layouts.app', 'front.layouts.header'], function($view) // composicion de vista : master blade
        {
          $a = app('request')->route();

          if(is_null($a)){

            $controller = "";
            $action = "";
            $tituloPagina = "Página no encontrada";

          } else {

              $action = $a->getAction();
                 // obtiene la accion : "App\Http\Controllers\HomeController@index" 
              $controller = class_basename($action['controller']); // obtiene el nombre base de la clase : "HomeController@index"
                /***************************/
                 //agregar en caso requieras el nombre base
              list($controller,$action) = explode('@', $controller);

                 //explode : {$controller : "HomeController", $action : "index"}
                /***************************/
              $namespace = "\\App\\Http\\Controllers\\".$controller;

              if(property_exists($namespace, 'name')){

                 $tituloPagina = $namespace::$name;

               } else {

                $tituloPagina = config('app.name');

              }

              $controller = str_replace('Controller', '', $controller);
          }


              $view->with(compact('controller', 'action', 'tituloPagina')); //envia el valor de controller y action al master blade.
            }); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
