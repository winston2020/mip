<?php

namespace App\Http\Controllers;

use App\Data;
use App\Host;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        return view($host->templet.'.index',compact('host'));
    }

    public function list($nav, Request $request)
    {
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        return view($host->templet.'.list',compact('host'));
    }

    public function show()
    {
        $host = $_SERVER['HTTP_HOST'];
        $domain =  str_after($host,'.');
        $yuming =  Host::where(['name'=>$domain])->first();
        return view($yuming->templet.'show');
    }
}
