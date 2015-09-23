<?php namespace App\Http\Controllers;

class TextIOC{

	public function show()
	{
		echo 'hhhhhhhh';
	$car = App::make('CarInterface');  
    $car->start();
    $car->gas();
    $car->brake();
}

}
