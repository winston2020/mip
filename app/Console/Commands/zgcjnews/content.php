<?php

namespace App\Console\Commands\zgcjnews;

use App\Data;
use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

class content extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zgc:content';
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
        $this->url = Data::where(['nav_id'=>6])->get();
        $client = new Crawler();
        $this->totalPageCount = count($this->url);
        $client = new Client();
        $requests = function ($total) use ($client) {
            foreach ($this->url as $uri) {
                yield function() use ($client, $uri) {
                    return $client->getAsync($uri->href);
                };
            }
        };

        $pool = new Pool($client, $requests($this->totalPageCount), [
            'concurrency' => $this->concurrency,
            'fulfilled'   => function ($response, $index){
                $this->index = $index;
                echo '爬取'.$this->url[$this->index]->href.PHP_EOL;
                $http = $response->getBody()->getContents();
                $word = mb_convert_encoding($http, "UTF-8", "GBK");
                $crawler = new Crawler();
                $crawler->addHtmlContent($word);
                $content = $crawler->filter('body > div.qq_body > div.qq_content.clearfix > div.qq_mainArea > div > div.qq_main > div.qq_article ')->html();
                preg_match_all('/<p.*?>(.*?)(?=<\/p>)/im', $content, $matches);
                $data['content'] = implode('<br>',$matches[1]);
                $res = Data::find($this->url[$this->index]->id);
                $res->content = $data['content'];
                $bool =  $res->save();
                if ($bool){
                    echo 'id'.$this->url[$this->index]->id.'成功';
                }else{
                    echo 'id'.$this->url[$this->index]->id.'失败';
                }
                $this->countedAndCheckEnded();
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


    function match($char)
    {
        preg_match_all('/[\x{4e00}-\x{9fa5}a-zA-Z0-9]/u' , $char, $result);
        return implode('', $result[0]);

    }

    public function countedAndCheckEnded()
    {
        if ($this->counter < $this->totalPageCount){
            return;
        }
    }
}
