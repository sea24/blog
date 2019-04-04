<?php

namespace App\Http\Controllers\Swoole;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ServerController extends BaseController
{
    public function onReceive($server){
        echo 6666;
        file_put_contents('/swoole.log', 123 . 'yes' . PHP_EOL, FILE_APPEND);
        /*$a = $server[0]->task($server[3]);
        print_r($a);*/
    }

    public function onTask($server){
        return $server[3];
        $server[0]->finish($server[3]);
    }

    public function onFinish($server){
        return $server[2];
    }
}
