<?php namespace App\Handlers;

use Illuminate\Support\Facades\Facade;

class AFacade extends Facade {

    protected static function getFacadeAccessor() { return 'A'; }//这个方法的工作是返回服务容器绑定的名称。

}