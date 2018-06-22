<?php

//require_once('./HyperDown/Parser.php');
//$parser = new HyperDown\Parser;
//$parser->enableHtml(true);
//$parser->_commonWhiteList .= '|img|cite|embed|iframe|video|source';
//$parser->_specialWhiteList = array_merge($parser->_specialWhiteList, array(
//    'ol'            =>  'ol|li',
//    'ul'            =>  'ul|li',
//    'blockquote'    =>  'blockquote',
//    'pre'           =>  'pre|code'
//));
// $html = $parser->makeHtml($text);

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
use Illuminate\Support\Facades\DB;
function log4($logContent, $data = [], $level='DEBUG', $name = 'App')
{
    $functionName = 'add' . ucwords(strtolower($level));
    $logPath = LOG_PATH . '' . $name . '/' . date('Y-m-d') . '.log';
    $logger = new Monolog\Logger($name);
    $logger->pushHandler(new Monolog\Handler\StreamHandler($logPath, Monolog\Logger::INFO));
    $logger->$functionName($logContent, $data);
}

/**
 * 对数据进行编码转换
 * @param array/string $data 数组
 * @param string $output 转换后的编码
 * Created on 2016-7-13
 */
function arrayIconv($data, $output = 'utf-8') {
    $encode_arr = array('UTF-8','ASCII','GBK','GB2312','BIG5','JIS','eucjp-win','sjis-win','EUC-JP');
    $encoded = mb_detect_encoding($data, $encode_arr);
    if (!is_array($data)) {
        return mb_convert_encoding($data, $output, $encoded);
    }
    else {
        foreach ($data as $key=>$val) {
            $key = array_iconv($key, $output);
            if(is_array($val)) {
                $data[$key] = array_iconv($val, $output);
            } else {
                $data[$key] = mb_convert_encoding($data, $output, $encoded);
            }
        }
        return $data;
    }
}


function musicApi($id, $type = 'song')
{
    $apiUrl = 'https://api.imjad.cn/cloudmusic/';
    $data = array(
        'type' => $type,
        'id' => $id
    );
    $apiUrl = $apiUrl . '?' . http_build_query($data);
    $res = json_decode(httpRequest($apiUrl), true);
    if ($res['code'] == 200) {
        return $res;
    }
}



/**
 * ·JSON输出
 * @return string
 * @author donghaichen <chendonghai888@gmail.com>
 */
function json($data = array(), $debug = false)
{
    header('Content-type: application/json;charset=utf8'); //json
    writeLog('debug', $data);
    if ($debug !== true) {
    }
    echo json_encode($data);
    exit();
}
function createGuid($uid = '', $namespace = '') {
    static $guid = '';
    $uid = uniqid("", true);
    $data = $namespace;
    $data .= $_SERVER['REQUEST_TIME'];
    $data .= $_SERVER['HTTP_USER_AGENT'];
    $data .= $_SERVER['LOCAL_ADDR'];
    $data .= $_SERVER['LOCAL_PORT'];
    $data .= $_SERVER['REMOTE_ADDR'];
    $data .= $_SERVER['REMOTE_PORT'];
    $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
    $guid = '' .
        substr($hash, 0, 8) .
        '-' .
        substr($hash, 8, 4) .
        '-' .
        substr($hash, 12, 4) .
        '-' .
        substr($hash, 16, 4) .
        '-' .
        substr($hash, 20, 12) .
        '';
    return $guid;
}
function get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['X-Forwarded-For']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['X-Forwarded-For'])) {
        $ip = $_SERVER['X-Forwarded-For'];
    }elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] AS $xip) {
            if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
            }
        }
    }
    return $ip;
}

//摘要截断
function dm_strimwidth($str ,$start , $width ,$trimmarker ){
    $output = preg_replace('/^(?:[x00-x7F]|[xC0-xFF][x80-xBF]+){0,'.$start.'}((?:[x00-x7F]|[xC0-xFF][x80-xBF]+){0,'.$width.'}).*/s','1',$str);
    return $output.$trimmarker;
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

function lastSql()
{
    $sql = DB::getQueryLog();
    $sql = $sql[0];
    foreach ($sql['bindings'] as $i => $binding) {
        if ($binding instanceof \DateTime) {
            $sql['bindings'][$i] = $binding->format('\'Y-m-d H:i:s\'');
        } else {
            if (is_string($binding)) {
                $sql['bindings'][$i] = "'$binding'";
            }
        }
    }
    // Insert bindings into query
    $query = str_replace(array('%', '?'), array('%%', '%s'), $sql['query']);
    $query = vsprintf($query, $sql['bindings']);
    $sql['sql'] = $query;
    ksort($sql);
    return $sql;
}

if(!function_exists('setEnv'))
{
    function setEnv($env_file = '')
    {
        $env_file = $env_file ? $env_file : APP_PATH . '/.env';
        $env = parse_ini_file($env_file, true);
        foreach ($env as $key => $val) {
            $name = strtoupper($key);
            if (is_array($val)) {
                foreach ($val as $k => $v) {
                    $item = $name . '_' . strtoupper($k);
                    putenv("$item=$v");
                }
            } else {
                putenv("$name=$val");
            }
        }
    }
}

if(! function_exists('getEnv')){
    /*
     * 获取环境变量
     *
     * @param string $key
     * @param strigin $default
     * @return string
     */
    function getEnv($key, $default = null)
    {
        $key =  str_replace('.', '_', strtoupper($key));
        var_dump($key);
        exit();
        $value = getenv($key);
        if ($value === false) {
            return value($default);
        }
        return urldecode($value);
    }
}