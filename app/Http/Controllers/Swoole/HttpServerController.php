<?php

namespace App\Http\Controllers\Swoole;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class HttpServerController extends BaseController
{
    public function onRequest($server, $n){
        $n->end(789789);
    }
}
