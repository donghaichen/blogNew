<?php
/**
 * Created by PhpStorm.
 * User: donghai
 * Date: 18-6-7
 * Time: 上午10:13
 */
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>donghaichen</title>
    <link rel="icon" href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="//unpkg.com/docsify/lib/themes/vue.css" title="vue">
    <style>
        nav.app-nav li ul {
            min-width: 100px;
        }
        .cover-main img {
            max-width: 200px;
            border-radius: 100%;
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
        coverpage: true,
//        executeScript: true,
        loadSidebar: true,
//        subMaxLevel: 2,
        name: 'donghai',
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
<script src="//unpkg.com/prismjs/components/prism-javascript.min.js"></script>
</body>
</html>
