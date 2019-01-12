<?php
/**
 * Created by PhpStorm.
 * User: 乔治·华盛顿
 * Date: 2019/1/11
 * Time: 13:35
 */

function 随机日期(){
    return \App\Data::随机日期();
}

function 最新文章列表($count){
    return \App\Data::NewPageList($count);
}

function 随机文章列表($count){
    return \App\Data::RandPageList($count);
}

function 人名(){
    return \App\Data::人名();
}

function 地名(){
    return \App\Data::地名();
}

function 栏目(){
    return \App\Data::栏目();
}

function 栏目文章列表($count){
    return \App\Data::栏目文章($count);
}

function 文章内容(){
    return \App\Data::文章内容();
}

function 随机图片(){
    $files = \Illuminate\Support\Facades\Storage::allFiles('img');
    return '/'.array_random($files);
}

function 当前栏目(){
    return \App\Data::CurrentNav();
}

function 当前URL(){
   return \Illuminate\Support\Facades\URL::current();
}

function 关键词($string, $len=1){
    $string = str_replace(array("\r\n", "\r", "\n"), "", $string);
    preg_match_all('/./u', $string, $matches);
    $data = array_chunk($matches[0],$len);
    foreach ($data as $key=>$item){
        $new[$key] = implode($item);
    }
    $keyword = implode($new,',');
    return $keyword;


}





