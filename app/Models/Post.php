<?php
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-9
 * Time: 上午11:37
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $hidden = [
        'password',
    ];
}