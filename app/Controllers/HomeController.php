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
        return view('home/index', []);
    }

    public function sidebar()
    {
        $posts = Post::all()
            ->pluck( 'title', 'id')
            ->toArray();
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
        echo $post;
    }
}