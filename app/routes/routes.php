<?php

return [
    'get' =>[
        '/' => 'HomeController@index',
        '/login' => 'LoginController@index',
        '/dashboard' => 'DashboradController@index'
    ],


    
    'post'=>[
        '/login' => 'LoginController@store'
    ]
];
