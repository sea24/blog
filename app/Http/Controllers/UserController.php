<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Matrix\Exception;


class UserController
{
    public function index(){
        echo "<pre>";
        print_r(config('seaswoole.Server.one'));
        $client = new \swoole_client(SWOOLE_SOCK_TCP);
        if (!$client->connect('127.0.0.1', 8501, -1))
        {
            exit("connect failed. Error: {$client->errCode}\n");
        }
        $list = [
            'data' => [
                'file' => 'index/password/index.file',
                'msg' => 'Undeifnd : Index',
                'code' => 124,
            ],
            'user_name' =>[
                'yanghailong'
            ],
        ];
        $client->send(json_encode($list, 320));
       // echo $client->recv();
        $client->close();
        echo 6666;
    }
}
