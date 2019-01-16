<?php

namespace App\Http\Controllers;

use App\Data;
use App\Host;
use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    public function index()
    {
        $host = $_SERVER['HTTP_HOST'];
        $page = request()->route('page');
        if (empty($page)){
            $page = 1;
        }
        $domain =  str_after($host,'.');
        $host =  Host::where(['name'=>$domain])->first();
        $data = Data::where(['data.host_id'=>$host->id])
            ->leftjoin('nav', 'data.nav_id', '=', 'nav.id')
            ->skip(($page-1)*3000)
            ->select('data.id','data.host_id','data.created_at','data.updated_at','nav.en_name')
            ->limit(30000)
            ->get();
        return response()->view('sitemap', ['data' => $data])->header('Content-Type', 'text/xml');
    }
}
