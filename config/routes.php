<?php
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-6
 * Time: 下午1:42
 */
use NoahBuscher\Macaw\Macaw;

Macaw::get('/', '\App\Controllers\HomeController@index');
Macaw::get('md/(:any)', function($name) {
    require VIEW_PATH . 'md/' . $name . '.md';
});
Macaw::get('md/_sidebar', '\App\Controllers\HomeController@sidebar');
Macaw::get('md/topic/(:any)', '\App\Controllers\HomeController@topic');
Macaw::error(function() {
    throw new Exception("路由无匹配项 404 Not Found");
});

