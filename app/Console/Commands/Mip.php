<?php

namespace App\Console\Commands;

use App\Data;
use App\Host;
use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

class Mip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mip:start';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $host = Host::all();
        foreach ($host as $item){
            $data = Data::where(['data.host_id'=>$item->id])
                ->leftjoin('nav','nav.id','=','data.nav_id')
                ->take(10000)
                ->select('nav.en_name','data.id')
                ->get();
            foreach ($data as $value){
                $urls[] = 'http://www.'.$item->name.'/'.$value->en_name.'/'.$value->id.'.html';
            }
            $newurl  = array_chunk($urls,1800);
            foreach ($newurl as $key=>$urldata){
                $api = 'http://data.zz.baidu.com/urls?site=www.'.$item->name.'&token='.$item->token.'&type=amp';
                $ch = curl_init();
                $options =  array(
                    CURLOPT_URL => $api,
                    CURLOPT_POST => true,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POSTFIELDS => implode("\n", $urldata),
                    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
                );
                curl_setopt_array($ch, $options);
                $result = curl_exec($ch);
                $this->info('当前域名'.$item->name.'第'.$key.'条数据'.$result);
            }
        }
    }
}
