<?php namespace App\Controllers;

//测试接口，IOC容器的绑定，以及实例的取出


interface CarInterface {
    public function start();
    public function gas();
    public function brake();
}
 
class Porche implements CarInterface {
    public function start() {
    echo 'Push button start'.'';
    }
    public function gas()  {
        echo '0 to 60 in 3.7 seconds!'.'';
    }
    public function brake() {
        echo 'Brakes? Who needs brakes?'.'';
    }
}
 