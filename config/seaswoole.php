<?php
/*swoole服务配置*/
return [
    /*HttpServer服务配置*/
    'Http' => [
        /*服务器1配置*/
        'one' => [
            'host' => '127.0.0.1', //服务器地址
            'port' => 8501, //端口
            'set' => [
                'worker_num' => 1, //woker进程
                'reactor_num' => 1, //线程数量，异步IO充分利用多化
                'open_cpu_affinity' => 1,
                'open_eof_check' => true,
                'package_eof' => '\r\n\r\n',
                'dispatch_mode' => 2,
                'package_max_length' => 1024 * 1024, //1M字节数
            ], //设置httpServer
            'notice_url' => '\App\Http\Controllers\Swoole\HttpServerController', //通知路径
            'request' => 'onRequest', //请求信息
            'log' => '/wwwroot/swoole.log',
        ],
        'two' => [
            'host' => '127.0.0.1', //服务器地址
            'port' => 8502, //端口
            'set' => [
                'worker_num' => 1, //woker进程
                'reactor_num' => 1, //线程数量，异步IO充分利用多化
                'open_cpu_affinity' => 1,
                'open_eof_check' => true,
                'package_eof' => '\r\n\r\n',
                'dispatch_mode' => 2,
                'package_max_length' => 1024 * 1024, //1M字节数
            ], //设置httpServer
            'notice_url' => '\App\Http\Controllers\Api\Terminal\V1\Receive\HttpServer1', //协程回调路径
            'request' => 'request', //请求信息
            'log' => '/wwwroot/swoole.log',
        ]
    ],

    /*Server服务器配置*/
    'Server' => [
        'one' => [
            'host' => '0.0.0.0', //服务器地址
            'port' => 8501, //端口
            'set' => [
                'reactor_num' => swoole_cpu_num() * 2,
                'worker_num' => swoole_cpu_num() * 2,
                'max_request' => 2000,
                'open_cpu_affinity' => 1,
                'log_file' => '/swoole.log',
                'task_worker_num' => 4,
            ], //这是server
            'notice_url' => '\App\Http\Controllers\Swoole\ServerController', //协程回调路径
            'log' => [
                'log_file' => 'swoole',
                'log_path' => base_path() . '/storage/swoole',
            ],
        ]
    ],

    /*WebSocket*/
    'WebSocket' => [
        'one' => [
            'host' => '127.0.0.1', //服务器地址
            'port' => 6501, //端口
            'set' => [
                'open_websocket_close_frame' => false,
            ], //这是server
            'notice_url' => '\App\Http\Controllers\Api\Terminal\V1\Receive\WebSocket', //协程回调路径
            'log' => '/wwwroot/swoole.log',
        ]
    ],

    /*Mysql连接池*/
    'Mysql' => [
        'one' => [
            'dbConfig' => [
                'host' => '127.0.0.1', //dns
                'port' => 3306, //端口
                'user' => 'root', //用户名
                'password' => 'root', //密码
                'database' => 'test', //数据库
                'charset' => 'utf8', //字符集
                'timeout' => 2,
            ],
            'min' => 10, //最少连接数
            'max' => 100, //最大连接数
            'balance' => 50,//空闲时均衡连接数
            'timeOut' => 3,//等待出队列等待时间（单位秒）
        ],
        'channel' => 1024 * 1024, //mysql缓存区容量（单位字节）
    ]

];