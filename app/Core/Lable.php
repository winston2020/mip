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

function 最新文章($count){
    return \App\Data::NewPage($count);
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



