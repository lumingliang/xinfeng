<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use  App\Services\A;

class AServiceProvider extends ServiceProvider{

	 public function register() 
	 {
        $this->app->singleton('A', function () //服务容器绑定的名称为A，以便可以利用它取出
        {
            return new \App\Services\A;
        });
     }
 }