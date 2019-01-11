<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Data extends Authenticatable
{
    protected $table = 'data';

    public static function NewPage($count)
    {
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        return Data::where(['host_id'=>$host->id])->take($count)->orderby('id','desc')->get();
    }

    public static function RandPageList($count)
    {
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        return Data::where(['data.host_id'=>$host->host_id])
            ->join('nav', 'data.nav_id', '=', 'nav.id')
            ->take($count)
            ->select('data.id','data.title','nav.en_name')
            ->get();
    }

    public static function BannerList($count){
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        return Data::orderByRaw("RAND()")->where(['data.host_id'=>$host->host_id])
            ->join('nav', 'data.nav_id', '=', 'nav.id')
            ->orderby('id','desc')
            ->take($count)
            ->select('data.id','data.title','nav.en_name')
            ->get();
    }

    public static function 随机日期()
    {
        return date("Y-m-d",strtotime("-".rand(0,5)." day"));
    }

    public static function 人名()
    {
        $data = file(public_path('author.txt'));
        return $data;
    }

    public static function 地名()
    {
        $data = file(public_path('city.txt'));
        return $data;
    }

    public static function 栏目()
    {
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        $nav =  Nav::where(['host_id'=>$host->id])->get();
        return $nav;
    }

    public static function 栏目文章($count)
    {
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        $nav = str_after(\Request::getRequestUri(),'/');
        $nav = Nav::where(['host_id'=>$host->id,'en_name'=>$nav])->first();
        $data =  Data::where(['data.host_id'=>$host->id,'data.nav_id'=>$nav->id])
            ->join('nav', 'data.nav_id', '=', 'nav.id')
            ->orderby('id','desc')
            ->take($count)
            ->select('data.id','data.title','nav.en_name','nav.name','data.content','data.created_at','data.updated_at')
            ->get();
        return $data;
    }

}
