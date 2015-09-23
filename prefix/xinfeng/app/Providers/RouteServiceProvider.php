<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		//定义路由全局模式不懂
		
		parent::boot($router);

		$router->pattern('id', '[0-9]+');
		//$router->pattern('name', '[a-z]+');
		/*使用路由木星绑定时候，先在这里定义user(表示对应的模型是Ａpp\User(注意反斜线)
		//$router->model('user', 'App\User');
		然后定义一个有 {user} 参数的路由：

Route::get('profile/{user}', function(App\User $user)
{
    //
});请求至  profile/1 将注入$user ID 为 1 的 User 实体(即查询到了id为一的一行)。*/

		
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
