<?php
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-6
 * Time: 下午1:41
 */

//注册自动加载
require __DIR__ . '/vendor/autoload.php';

// whoops 错误提示
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//定义目录
define('APP_PATH', __DIR__);
define('CONF_PATH', __DIR__ . '/config');
define('RESOURCES_PATH', __DIR__ . '/resource/');
define('STORAGE_PATH', APP_PATH . '/storage/' );
define('LOG_PATH', STORAGE_PATH . 'logs/' );
define('VIEW_PATH', RESOURCES_PATH . 'views/');
//加载配置
require APP_PATH . '/config/routes.php';
$database = require CONF_PATH . '/database.php';
$database = $database['mysql'];

//其他配置
date_default_timezone_set("PRC");
//加载Eloquent  创建链接 | 设置全局静态可访问 | 启动Eloquent
use Illuminate\Database\Capsule\Manager as DB;
$db = new DB;
$db->addConnection($database);
$db->setAsGlobal();
$db->bootEloquent();
log4('rtest',$_SERVER,'NOTICE');

//运行项目
\NoahBuscher\Macaw\Macaw::dispatch();
