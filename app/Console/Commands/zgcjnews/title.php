<?php

namespace App\Console\Commands\zgcjnews;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

class title extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zgc:title';
    private $totalPageCount;
    private $counter        = 1;
    private $concurrency    = 3;  // 同时并发抓取
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
        set_time_limit(0);
        ini_set('memory_limit', '128M');
        $url = 'https://sports.qq.com/';
        $client = new Client();
        $http = $client->get($url)->getBody()->getContents();
        $word = mb_convert_encoding($http, "UTF-8", "GBK");
        $crawler = new Crawler();
        $crawler->addHtmlContent($word);
        $arr = $crawler->filter('#main1 > div.layout.site-scr.mt25 > div.slide-wrap > div > div.chief > div > div > p')->each(function ($node,$i) use ($word) {
            $data['title'] = $node->filter('p > a')->text();
            $data['href'] =  $node->filter('p > a')->attr('href');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['nav_id'] = 6;
            //$content = $node->filter('body > div.main3 > div.left > div > div.cont > div')->html();
            //$data['content'] = mb_convert_encoding($content, 'UTF-8');
            return $data;
        });

        foreach ($arr as $item){
            if (strpos($item['href'],"https://sports.qq.com/a")>-1){
                $newdata[] = $item;
            }
        }

        $bool = DB::table('data')->insert($newdata);
        if ($bool){
            echo 'success'.PHP_EOL;
        }else{
            echo 'fail'.PHP_EOL;
        }
    }
}
