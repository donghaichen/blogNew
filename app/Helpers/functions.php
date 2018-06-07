<?php
//日志等级
//DEBUG (100): 详细的debug信息。
//
//INFO (200): 关键事件。
//
//NOTICE (250): 普通但是重要的事件。
//
//WARNING (300): 出现非错误的异常。
//
//ERROR (400): 运行时错误，但是不需要立刻处理。
//
//CRITICA (500): 严重错误。

function log4($logContent, $data = [], $level='DEBUG', $name = 'App')
{
    $functionName = 'add' . ucwords(strtolower($level));
    $logPath = LOG_PATH . '' . $name . '/' . date('Y-m-d') . '.log';
    $logger = new Monolog\Logger($name);
    $logger->pushHandler(new Monolog\Handler\StreamHandler($logPath, Monolog\Logger::INFO));
    $logger->$functionName($logContent, $data);
}

function view($path, $data)
{
    extract($data);
    $viewFile = VIEW_PATH . $path . '.php';
    if ( is_file($viewFile) ) {
        require $viewFile;
    } else {
        throw new UnexpectedValueException("视图文件{$viewFile}不存在！");
    }
}

function httpRequest($url, $data = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, TRUE);
        if (is_array($data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        }else{
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

    }
    curl_setopt($curl, CURLOPT_TIMEOUT, 5);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}
