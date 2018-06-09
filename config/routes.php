<?php
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-6
 * Time: 下午1:42
 */
use \NoahBuscher\Macaw\Macaw as Route;

Route::get('/', '\App\Controllers\HomeController@index');
Route::get('md/(:any)', function($name) {
    require VIEW_PATH . 'md/' . $name . '.md';
});
Route::get('md/_sidebar', '\App\Controllers\HomeController@sidebar');
Route::get('md/post/(:num)', '\App\Controllers\HomeController@showPost');
Route::error(function() {
    throw new Exception("路由无匹配项 404 Not Found");
});
