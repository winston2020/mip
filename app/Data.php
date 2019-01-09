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
        return Data::where(['data.host_id'=>$host->id])
            ->join('nav', 'data.nav_id', '=', 'nav.id')
            ->take($count)
            ->select('data.id','data.title','nav.en_name')
            ->get();
    }
}
