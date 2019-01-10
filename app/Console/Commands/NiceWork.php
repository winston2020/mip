<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

class NiceWork extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:start';
    private $totalPageCount;
    private $counter        = 1;
    private $concurrency    = 5;  // 同时并发抓取
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
        for ($i=0;$i<20030;$i++){
            $this->url[] = 'https://so.gushiwen.org/guwen/bookv_'.$i.'.aspx';
        }
        $this->totalPageCount = 20030;
        $client = new Client();
        $requests = function ($total) use ($client) {
                foreach ($this->url as $this->key1=>$uri){
                    yield function() use ($client, $uri) {
                        $this->uri =  $uri ;
                        return $client->getAsync($uri);
                    };
                }
        };

        $pool = new Pool($client, $requests($this->totalPageCount), [
            'concurrency' => $this->concurrency,
            'fulfilled'   => function ($response, $index){
                echo '爬取'.$this->url[$index].PHP_EOL;
                $http = $response->getBody()->getContents();
                $bool = strpos($http,'该文章不存在或已被删除');
                if ($bool===true){
                  echo '当前文章没有'.PHP_EOL;
                }else{
                    $crawler = new Crawler();
                    $crawler->addHtmlContent($http);
                    try
                    {
                        $data['title'] = $crawler->filter('head > title')->text();
                        $content = $crawler->filter('body > div.main3 > div.left > div > div.cont > div')->html();
                        $data['created_at'] = date('Y-m-d H:i:s');
                        $data['updated_at'] = date('Y-m-d H:i:s');
                        $data['type_id'] = 1;
                        $data['content'] = mb_convert_encoding ($content, 'UTF-8');
                    }
                    catch(\Exception $e)
                    {
                        echo 'html解析出错'.PHP_EOL;
                    }
                    $bool = DB::table('data')->insert($data);
                    if ($bool){
                        echo 'success'.PHP_EOL;
                    }else{
                        echo 'fail'.PHP_EOL;
                    }
                    echo $response->getStatusCode().PHP_EOL;
                $this->countedAndCheckEnded();
                }
            },
            'rejected' => function ($reason, $index){
//                    log('test',"rejected" );
//                    log('test',"rejected reason: " . $reason );
                $this->countedAndCheckEnded();
            },
        ]);

        $promise = $pool->promise();
        $promise->wait();
    }

    public function countedAndCheckEnded()
    {
        if ($this->counter < $this->totalPageCount){
            return;
        }
    }

}