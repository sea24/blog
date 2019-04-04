<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Src\Sea\HttpServer\HttpServer as SwooleHttpServer;

class HttpServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Swoole:Http:Server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '启动http服务';

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
        $swooleHttpServer = new SwooleHttpServer('one');
    }
}
