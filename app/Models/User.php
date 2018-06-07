<?php
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-6
 * Time: 下午6:26
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
//    protected $guard = array('email','password');
//    protected $fillable = array('nickname','email','password');
//    protected $hidden = array('password', 'remember_token');
//前两者为 自动填充 Mass Assignment 的黑名单和白名单。第三者为 转换成数组或 JSON 时隐藏属性。
    protected $table = 'user';
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}