<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Data extends Authenticatable
{
    protected $table = 'data';

    public static function NewPageList($count)
    {
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();

        return  Data::where(['data.host_id'=>$host->id])
            ->join('nav', 'data.nav_id', '=', 'nav.id')
            ->take($count)
            ->select('data.id','data.title','nav.name','nav.en_name','data.content')
            ->orderby('data.id','desc')
            ->simplePaginate(15);
    }

    public static function RandPageList($count)
    {
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        return Data::where(['data.host_id'=>$host->id])
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
        $data = file(public_path('data/author.txt'));
        return  array_random($data);
    }

    public static function 地名()
    {
        $data = file(public_path('data/city.txt'));
        return array_random($data);
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
        $nav = request()->route('nav');
        $nav = Nav::where(['host_id'=>$host->id,'en_name'=>$nav])->first();
        $data =  Data::where(['data.host_id'=>$host->id,'data.nav_id'=>$nav->id])
            ->join('nav', 'data.nav_id', '=', 'nav.id')
            ->orderby('id','desc')
            ->select('data.id','data.title','nav.en_name','nav.name','data.content','data.created_at','data.updated_at')
            ->simplePaginate($count);
        return $data;
    }

    public static function 文章内容(Request $request){
        $id = $request->route( 'id' );
        $data =  Data::find($id);
        return $data;
    }

    public static function CurrentNav()
    {
        $nav = request()->route('nav');
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        $data = \App\Nav::where(['host_id'=>$host->id,'en_name'=>$nav])->first();
        return  $data;
    }

    public static function NewNav()
    {
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        $res =  HostNav::where(['hostnav.host_id'=>$host->id])
            ->join('nav','nav.id','=','host.id')
            ->get();
        return $res;
    }



}
