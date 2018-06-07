<?php
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-6
 * Time: 下午2:20
 */

namespace App\Controllers;


use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home/index', []);
    }

    public function sidebar()
    {
        $rs = json_decode(httpRequest('https://cnodejs.org/api/v1/topics'), true)['data'];
        $html = '';
        foreach ($rs as $k => $v)
        {
            $title = $v['title'];
            $link = $v['id'];
            $html .= "* [{$title}](topic/{$link}) \n" ;
        }
        echo $html;
    }
    public function topic($id)
    {
        $rs = json_decode(httpRequest('https://cnodejs.org/api/v1/topic/' . $id), true)['data']['content'];
        echo $rs;
    }
}