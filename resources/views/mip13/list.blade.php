<!DOCTYPE html>
<html mip="" class="mip-i-android-scroll">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style mip-extension="mip-fixed">mip-fixed {
            position: fixed !important
        }

        mip-fixed[data-slide] {
            -webkit-transition: transform .5s;
            transition: transform .5s
        }

        mip-fixed[data-slide].mip-fixed-hide-top {
            -webkit-transform: translate3d(0, -200%, 0);
            transform: translate3d(0, -200%, 0)
        }

        mip-fixed[data-slide].mip-fixed-hide-bottom {
            -webkit-transform: translate3d(0, 200%, 0);
            transform: translate3d(0, 200%, 0)
        }</style>
    <style mip-extension="mip-history">mip-history.mip-history-default {
            padding: 10px;
            margin: 10px;
            background: #eee;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
            tap-highlight-color: rgba(0, 0, 0, 0.1)
        }

        mip-history.mip-history-default:hover {
            background-color: rgba(0, 0, 0, 0.1)
        }</style>
    <style mip-extension="mip-gototop">mip-gototop {
            display: none !important;
            border-radius: 5px;
            width: 36px;
            height: 36px;
            background-size: 50% 50%;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            border: 1px solid #999;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADsAAAA8CAYAAADYIMILAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA4ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo4N2M5ODc5Zi0xMDMxLTRjZWYtOWViMy1lMmIxNzNkMDU1MTAiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OUEwOTQ3MUIxMDdEMTFFNkIwNDFFMDRENzk5MUQ2RDIiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OUEwOTQ3MUExMDdEMTFFNkIwNDFFMDRENzk5MUQ2RDIiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxM2I0YTVjYS1mNzQ0LTRhMGEtYjI0Yy02NmM1N2I3NTE2NGIiIHN0UmVmOmRvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDozYThhODFlZS01OGQ4LTExNzktYmYwNi1lNTU4YzcyN2M2NTkiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6FlgSqAAACS0lEQVR42uzbO0hbYRQH8JtLqYKU4ANBO7RQijjooHVx6uRktw6FFju1UIRIBwdFLfZBHcSWFjo5FLfi5pap7eAUB6dCO5RSh0BRQ8CISqn+v3IOhENyE+/DfPfm/OHv43gdft7XdyNJDSOO42TQDie52UffuU0AdciXcZ3mScpg36OFhEP3zGF8CR+20Ilm2LXNdBgrVrEhZQRdQz+iw0nGdqNTaDvaic6hQ0nEGuhrNF02M3eCWXQgSViGdlf4WQu6gPYlAesF5bSii+iNOGPrgXLaCHwtjtjzQDnmfH6B9sYJWw36tcK26+J7c6V+dc4/UsOwXtCVCtube+6GmHWhL+mztdha0H9Vfm8VzYpZD4HTNmL9Qk1O0Q/oZzG/SuArNmGDQDlmm7fopphfp6t0mw3YMKDl4GU0J+Y30We0AGkYNkwo5y+6hG6LeT+ttC43AhsFlHNC5+o3MR9EZ2hNfWHYKKGcY/Q5+kPMb6HTfneSayGUU6Jz9ZeYj6JP/YBdS6GcA3ru3RHz2+gkmooCWw36JUIop4jOo3kxH0MfhY31gr6JGMrZoz28K+Z30IdhYW2Acv7QKxv7Yn4XvRcU22URlJOnQ7oo5vfR8SDYJ5ZBOb9pgVES8wdBsGkLoZyfdFs6FKsv39hP6BF9nbUIyvlODwnm0C7Qk5NnvJZeObrStVa4KNgSs6R8XO/GtdaZh+JQiXX0fz2KVaxiFatYxSpWsYpVrGIVq1jFKlaxilWsYhVrHbb8xfZC0rH8HqL/77O5aOyZAAMARRuDCbImm0EAAAAASUVORK5CYII=);
            background-color: #fff
        }

        .mip-gototop-show {
            display: block !important
        }</style>

    <meta name="applicable-device" content="pc,mobile">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="https://www.mipcms.cn/favicon.ico" type="image/x-icon">
    <title>功能介绍_{{$host->title}}</title>
    <meta name="keywords" content="{{$host->keyword}}">
    <meta name="description" content="{{$host->desc}}">


    <link rel="stylesheet" type="text/css" href="/{{$host->templet}}/style/css/mip.css">
    <link rel="stylesheet" href="/{{$host->templet}}/style/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/{{$host->templet}}/style/css/mipcms.css">
    <style mip-custom="">


    </style>
    <link rel="canonical" href="{{url('')}}">
</head>
<body class="mip-i-android-scroll" style="opacity: 1; animation: none;">
<mip-cambrian site-id="1544095438960114" class="mip-element mip-layout-container"></mip-cambrian>
<mip-fixed type="top" mipdata-fixedidx="Fixed0" style="z-index: 10000;" class="mip-element mip-layout-container">
    <div class="mipmb-header mipmb-header-default" id="mip_header">
        <div class="container d-lg-flex justify-content-between">
            <div class="d-lg-flex justify-content-start">
                <div class="logo-text">
                    <a data-type="mip" href="{{url('')}}" data-title="{{$host->title}}">{{$host->title}}</a>
                </div>
                <ul class="mipmb-menu list-unstyled d-lg-flex">
                    <li class="">
                        <a href="{{url('')}}" data-type="mip" data-title="{{$host->title}}" title="首页">首页</a>
                    </li>
                    @foreach(\App\Data::栏目() as $item)
                        <li class="mipmb-dropdown-item ">
                            <a href="{{$item->en_name}}/" data-type="mip" data-title="{{$item->name}}"
                               title="{{$item->name}}">{{$item->name}}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="d-lg-flex d-none">
                <ul class="mipmb-menu list-unstyled">
                    <li>
                        <a href="{{url('')}}">登录</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</mip-fixed>
<main class="mipcms-main">

    <div class="container">
        <ul class="list-unstyled d-flex breadcrumb p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="{{url('')}}" title="{{$host->title}}">{{$host->title}}</a></li>
            <li class="breadcrumb-item"><a href="{{url('')}}/{{$item->en_name}}/" title="功能介绍">功能介绍</a></li>
        </ul>
        <div class="row">
            <main class="col-lg-8">
                <section class="mip-box mip-box-default">
                    <section class="mip-box-heading">
                        <h3>功能介绍</h3>
                    </section>
                    <section class="mip-box-body">
                        <div class="mipui-widget-media-body mipui-category-list-001">
                            @foreach(\App\Data::栏目文章(10) as $item)
                            <div class="mipui-category-list-item">
                                <div class="item-media">
                                    <a href="{{url('')}}/{{$item->en_name}}/{{$item->id}}.html"
                                       class="item-link" data-type="mip" data-title="{{$item->title}}"
                                       title="{{$item->title}}">
                                        <mip-img layout="container" alt="{{$item->title}}"
                                                 src="/uploads/article/2018/09/10/5b967e2fd8396.png"
                                                 class="mip-element mip-layout-container mip-img-loaded"><img
                                                    class="mip-fill-content mip-replaced-content" alt="{{$item->title}}"
                                                    src="/{{$host->templet}}/style/images/5b967e2fd8396.png"></mip-img>
                                    </a>
                                </div>
                                <div class="item-content">
                                    <h4><a href="{{url('')}}/{{$item->en_name}}/{{$item->id}}.html"
                                           data-type="mip" data-title="{{$item->title}}" title="{{$item->title}}">{{$item->title}}</a>
                                    </h4>
                                    <p class="description">
                                        有很多小伙伴们不知道如何在MIPCMS里面插入外站视频，那么今天就教大家几招，来解决外部视频插入的烦恼。新建自定义字段自定义字段是跟着文章，不是全局的，如果新建全局字段，可以用</p>
                                    <p>
                                        <span>{{  date('Y-m-d',strtotime($item->created_at)) }}</span>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="page-control">
                            <ul class="pagination">
                                <li class="page-item active"><span class="page-link">1</span></li>
                                <li class="page-item"><a class="page-link" data-type="mip"
                                                         href="https://www.mipcms.cn/article/function/index_2.html">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" data-type="mip"
                                                         href="https://www.mipcms.cn/article/function/index_2.html">&gt;</a>
                                </li>
                            </ul>
                        </div>
                    </section>

                </section>
            </main>
            <aside class="col-lg-4 hidden-xs">
                <section class="mip-box mip-box-default">
                    <section class="mip-box-heading">
                        <h3>热门文章</h3>
                    </section>
                    <section class="mip-box-body">
                        <ul class="list-unstyled">
                            <li class="li-box-list">
                                <a href="https://www.mipcms.cn/article/20ab67fe95c01e380d185239.html" data-type="mip"
                                   data-title="如何正确的使用MIPCMS" title="如何正确的使用MIPCMS">如何正确的使用MIPCMS</a>
                                <p>2017-07-30</p>
                            </li>
                            <li class="li-box-list">
                                <a href="https://www.mipcms.cn/article/cb3014e87c2d90fc194a4afa.html" data-type="mip"
                                   data-title="MIPCMS图文安装教程" title="MIPCMS图文安装教程">MIPCMS图文安装教程</a>
                                <p>2017-05-03</p>
                            </li>
                            <li class="li-box-list">
                                <a href="https://www.mipcms.cn/article/4472fd522aa77d689386bc8d.html" data-type="mip"
                                   data-title="MIPCMS内容管理系统MIP模板标签说明文档（更新中）" title="MIPCMS内容管理系统MIP模板标签说明文档（更新中）">MIPCMS内容管理系统MIP模板标签说明文档（更新中）</a>
                                <p>2017-06-11</p>
                            </li>
                            <li class="li-box-list">
                                <a href="https://www.mipcms.cn/article/7ed35d6adcf8e4e8d875bb4a.html" data-type="mip"
                                   data-title="MIPCMS集成百度站内搜索详细步骤流程"
                                   title="MIPCMS集成百度站内搜索详细步骤流程">MIPCMS集成百度站内搜索详细步骤流程</a>
                                <p>2017-07-21</p>
                            </li>
                            <li class="li-box-list">
                                <a href="https://www.mipcms.cn/article/fd13bdb1c237da84980e1c2a.html" data-type="mip"
                                   data-title="百度官方号如何提交内容？" title="百度官方号如何提交内容？">百度官方号如何提交内容？</a>
                                <p>2017-08-17</p>
                            </li>
                            <li class="li-box-list">
                                <a href="https://www.mipcms.cn/article/687a024249e17b80ef82c3b5.html" data-type="mip"
                                   data-title="百度MIP批量提交功能开通，MIPCMS值得拥有" title="百度MIP批量提交功能开通，MIPCMS值得拥有">百度MIP批量提交功能开通，MIPCMS值得拥有</a>
                                <p>2017-06-10</p>
                            </li>
                        </ul>
                    </section>
                </section>

                <div class="mip-box">
                    <div class="mip-box-heading">
                        <h3 class="title">热门标签</h3>
                    </div>
                    <div class="mip-box-body">
                        <ul class="list-unstyled tags">
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/1/" data-type="mip" data-title="mip"
                                                  title="mip">mip</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/2/" data-type="mip"
                                                  data-title="mipcms" title="mipcms">mipcms</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/5/" data-type="mip" data-title="案例"
                                                  title="案例">案例</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/8/" data-type="mip" data-title="百度"
                                                  title="百度">百度</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/3/" data-type="mip" data-title="seo"
                                                  title="seo">seo</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/6a03f5805e794d637c121a63/"
                                                  data-type="mip" data-title="官方号" title="官方号">官方号</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/6/" data-type="mip" data-title="网站"
                                                  title="网站">网站</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/148862027553019d1f3ed93d/"
                                                  data-type="mip" data-title="MIP站群" title="MIP站群">MIP站群</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/703d93683808333173403806/"
                                                  data-type="mip" data-title="升级" title="升级">升级</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/fc402737a0e3a30a26dbec62/"
                                                  data-type="mip" data-title="编辑器" title="编辑器">编辑器</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/4/" data-type="mip" data-title="教程"
                                                  title="教程">教程</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/7/" data-type="mip" data-title="关键词"
                                                  title="关键词">关键词</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/9/" data-type="mip" data-title="内容"
                                                  title="内容">内容</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/10/" data-type="mip" data-title="蜘蛛"
                                                  title="蜘蛛">蜘蛛</a></li>
                            <li class="m-b-sm"><a href="https://www.mipcms.cn/tag/11/" data-type="mip" data-title="统计"
                                                  title="统计">统计</a></li>
                        </ul>
                    </div>
                </div>

            </aside>

        </div>
    </div>

</main>
<footer class="mipui-footer">
    <div class="container">
        <div class="friend-link hidden-xs">
            <ul>
                <li> 友情链接：</li>
                <li>
                    <a href="http://www.dysfz.com/" data-type="mip" data-title="电影首发站" title="电影首发站" target="_blank">电影首发站</a>
                </li>
                <li>
                    <a href="http://www.mipcms.com/" data-type="mip" data-title="mip" title="mip"
                       target="_blank">mip</a>
                </li>
                <li>
                    <a href="http://www.mipzhanqun.cn/" data-type="mip" data-title="MIP站群" title="MIP站群"
                       target="_blank">MIP站群</a>
                </li>
                <li>
                    <a href="http://www.gwxwl.com/" data-type="mip" data-title="网站编程网" title="网站编程网" target="_blank">网站编程网</a>
                </li>
            </ul>
        </div>
        <p class="text-center mip-footer">©2019 <a data-type="mip" href="https://www.mipcms.cn/" data-title="MIPCMS演示站">MIPCMS演示站</a>
            <a href="http://www.miibeian.gov.cn/"> 苏ICP备16039536号-2</a> Powered By 苏州三三云网络科技有限公司
            <mip-stats-baidu token="aa0ba8827eb0b92deb3dc9369698d6d3" class="mip-element mip-layout-container">
                <script src="./功能介绍_MIPCMS演示站_files/hm.js"></script>
            </mip-stats-baidu>
        </p>
    </div>
</footer>
<mip-fixed type="gototop" mipdata-fixedidx="Fixed1" style="z-index: 9999; bottom: 90px; right: 10%;"
           class="mip-element mip-layout-container">
    <mip-gototop class="mip-element mip-layout-container"></mip-gototop>
</mip-fixed>

<script src="./功能介绍_MIPCMS演示站_files/mip.js"></script>
<script src="./功能介绍_MIPCMS演示站_files/mip-stats-baidu.js"></script>
<script src="./功能介绍_MIPCMS演示站_files/mip-gototop.js" type="text/javascript" charset="utf-8"></script>
<script src="./功能介绍_MIPCMS演示站_files/mip-history.js" type="text/javascript" charset="utf-8"></script>
<script src="./功能介绍_MIPCMS演示站_files/mip-fixed.js" type="text/javascript" charset="utf-8"></script>
<script src="./功能介绍_MIPCMS演示站_files/mip-cambrian.js"></script>


</body>
</html>