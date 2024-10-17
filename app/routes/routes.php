<?php

return [
    'get' =>[
        '/' => 'HomeController@index',
        '/login' => 'LoginController@index',
        '/dashboard' => 'DashboradController@index:auth'
    ],


    
    'post'=>[
        '/login' => 'LoginController@store'
    ]
];
