<?php
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-7
 * Time: 上午10:13
 */
?>
<!--
                              _ooOoo_
                             o8888888o
                             88" . "88
                             (| -_- |)
                             O\  =  /O
                          ____/`---'\____
                        .'  \\|     |//  `.
                       /  \\|||  :  |||//  \
                      /  _||||| -:- |||||-  \
                      |   | \\\  -  /// |   |
                      | \_|  ''\---/''  |   |
                      \  .-\__  `-`  ___/-. /
                    ___`. .'  /--.--\  `. . __
                 ."" '<  `.___\_<|>_/___.'  >'"".
                | | :  `- \`.;`\ _ /`;.`/ - ` : | |
                \  \ `-.   \_ __\ /__ _/   .-` /  /
           ======`-.____`-.___\_____/___.-`____.-'======
                              `=---='
           ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                      佛祖保佑        永无BUG
             佛曰:
                    写字楼里写字间，写字间里程序员；
                    程序人员写程序，又拿程序换酒钱。
                    酒醒只在网上坐，酒醉还来网下眠；
                    酒醉酒醒日复日，网上网下年复年。
                    但愿老死电脑间，不愿鞠躬老板前；
                    奔驰宝马贵者趣，公交自行程序员。
                    别人笑我忒疯癫，我笑自己命太贱；
                    不见满街漂亮妹，哪个归得程序员？
-->
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>女孩为何穿短裙</title>
    <link rel="icon" href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="//unpkg.com/docsify/lib/themes/vue.css" title="vue">
    <link rel="stylesheet" href="//unpkg.com/gitalk/dist/gitalk.css">
    <style>
        nav.app-nav li ul {
            min-width: 100px;
        }
        section.cover{
            background: url(https://login.deepin.org/static/login/image/bg_4.jpg)!important;
        }
        section.cover p {
            color: #ffffff;
        }
        section.cover .cover-main>p:last-child a {
            border: 1px solid var(--theme-color,#FFF);
            color: #ffffff;
        }
        section.cover .cover-main>p:last-child a:last-child {
            background-color: var(--theme-color,#42b983);
            border: 1px solid var(--theme-color,#42b983);
            color: #fff;
        }
        section.cover .cover-main img {
            max-width: 200px;
            border-radius: 100%;
        }
        .gt-container {
            padding: 30px 15px 40px;
        }
    </style>
</head>
<body>
<div id="app">拼命加载中 ...</div>
<script>
    window.$docsify = {
        alias: {
            '/.*/_sidebar': '/_sidebar'
        },
        ext: '',
        homepage: 'README',
        repo: 'https://github.com/donghaichen',
        auto2top: true,
//        onlyCover: true,
        coverpage: true,
//        executeScript: true,
        loadSidebar: true,
//        subMaxLevel: 2,
        name: 'Home',
        basePath: 'md/',
        search: {
            noData: {
                '/': '没有结果!'
            },
            paths: 'auto',
            placeholder: {
                '/': '搜索'
            }
        },
        formatUpdated: '{MM}/{DD} {HH}:{mm}',
    }
</script>
<script src="//unpkg.com/docsify/lib/docsify.js"></script>
<script src="//unpkg.com/docsify/lib/plugins/search.min.js"></script>
<script src="//unpkg.com/prismjs/components/prism-bash.min.js"></script>
<script src="//unpkg.com/prismjs/components/prism-markdown.min.js"></script>
<script src="//unpkg.com/prismjs/components/prism-nginx.min.js"></script>
<script src="//unpkg.com/prismjs/components/prism-php.min.js"></script>
<script src="//unpkg.com/prismjs/components/prism-sql.min.js"></script>
<script src="//unpkg.com/prismjs/components/prism-javascript.min.js"></script>
<script src="//unpkg.com/docsify/lib/plugins/gitalk.min.js"></script>
<script src="//unpkg.com/gitalk/dist/gitalk.min.js"></script>
<script>
    var gitalkConfig = {
        clientID: '071bd8d83f2f1b161a45',
        clientSecret: '5347b7ff212b5f739282e0f1721e502c24486a74',
        repo: 'blogNew',
        owner: 'donghaichen',
        admin: ['donghaichen'],
        id: hashChangeFire(),
        language: 'zh-CN',// Ensure uniqueness and length less than 50
        distractionFreeMode: true
    };
    var gitalk = new Gitalk(
        gitalkConfig
    );

    //监听触发操作
    function hashChangeFire(){
        var id = window.location.href;
        window.onhashchange = function() {
            id = window.location.href;
        };
        console.log(id);
        id = id.replace(/((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+[$#]/g, '');
        console.log(id);
        return id;
    }

    function hashHandler(){
        this.oldHash = window.location.hash;
        this.Check;

        var that = this;
        var detect = function(){
            if(that.oldHash!=window.location.hash){
                alert("HASH CHANGED - new has" + window.location.hash);
                that.oldHash = window.location.hash;
            }
        };
        this.Check = setInterval(function(){ detect() }, 100);
    }

    var hashDetection = new hashHandler();


    //url变化监听器
//    if( ('onhashchange' in window) && ((typeof document.documentMode==='undefined') || document.documentMode==8)) {
//        // 浏览器支持onhashchange事件
//        window.onhashchange = hashChangeFire;  // TODO，对应新的hash执行的操作函数
//    } else {
//        // 不支持则用定时器检测的办法
//        setInterval(function() {
//            // 检测hash值或其中某一段是否更改的函数， 在低版本的iE浏览器中通过window.location.hash取出的指和其它的浏览器不同，要注意
//            var ischanged = isHashChanged();
//            if(ischanged) {
//                hashChangeFire();  // TODO，对应新的hash执行的操作函数
//            }
//        }, 150);
//    }
</script>
</body>
</html>
