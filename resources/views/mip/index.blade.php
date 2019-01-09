<!DOCTYPE html>
<html mip>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="canonical" href="https://m.360zimeiti.com/">
    <title>{$toptitle}</title>
    <meta name="keywords" content="{{$host->keyword}}">
    <meta name="description" content="{{$host->desc}}">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name=" apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="stylesheet" type="text/css" href="{{$host->templet}}/style/css/mip.css">
    <link rel="stylesheet" href="/{{$host->templet}}/style/css/base.css">
    <link rel="stylesheet" href="/{{$host->templet}}/style/css/common.css">
    <link rel="stylesheet" href="/{{$host->templet}}/style/css/iconfont.css">
    <script async="async" src="/{{$host->templet}}/style/js/mip-stats-baidu.js"></script>
</head>
<body>
<div class="barMain">
    <div class="boxMain">
        <!--header Star -->
        <header class="clearfix">
            <h1><a href="{{url('')}}">{{$host->webname}}</a></h1>
        </header>
        <!--header End -->

        <!--mainBox Star -->
        <div class="mainBox">

            <div id="sliderTxt" class="sliderTxt swipe">
                <div class="swipeWrap">
                    <ul class="swiper-wrapper tabTxtSwipe clearfix">
                        <li class="swiper-slide current"><a href="{{url('')}}">首页</a></li>
                        {loop type='typename' row=5}
                        <li class="swiper-slide"><a href="{$vo.typeurl}">{$vo.typename}</a></li>
                        {/loop}
                    </ul>
                </div>


            </div>
            <!--articleBar Star -->
            <ul class="articleBar">
                {loop type='arclist' row=33}
                <li class="imgBar">
                    <a class="linkBar clearfix"  href="{$vo.url}">
                        <div class="txtInfo">
                            <h3>{$vo.title}</h3>
                            <p><span class="time">{$vo.postdate}</span><span class="comment">浏览：{$vo.hits}</span></p>
                        </div>

                    </a>
                </li>
                {/loop}
            </ul>
            <!--articleBar End -->



        </div>
        <!--mainBox End -->
    </div>

    <!--footer Star -->
    <footer>
        <p>CopyRight 20012-2019 {{$host->title}}
        </p>

    </footer>
    <!--footer End -->
</div>
<script src="/{{$host->templet}}/style/js/mip.js"></script>
</body>
</html>
