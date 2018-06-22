<?php
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-6
 * Time: 下午2:20
 */

namespace App\Controllers;


use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
//        var_dump($_ENV);
//        var_dump(env('DB_HOST'));
//        exit();
        return view('home/index', []);
    }

    public function sidebar()
    {
        $posts = Post::all()
            ->pluck( 'title', 'id')
//            ->sortByDesc('id')
            ->toArray();
        krsort($posts);
        $html = '';
        foreach ($posts as $k => $v)
        {
            $title = $v;
            $id = $k;
            $html .= "* [{$title}](post/{$id}) \n" ;
        }
        echo $html;
    }

    public function showPost($id)
    {
        $post = Post::find($id)->toArray();
        $post = str_replace('<!--markdown-->', '',$post['content']);
//        $post = httpRequest('https://docsify.js.org/zh-cn/plugins.md');
        echo $post;
    }
}