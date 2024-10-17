<?php

namespace app\controllers;

class DashboradController
{
    public function index()
    {
        view('dashboard_home', [
            'title' => 'Dashboard'
        ]);
    }

}
