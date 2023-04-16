<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function testadmin()
    {
        if (logged_in()) {
            echo user_id();
        } else {
            echo "belum login";
        }
        if (has_permission('testadmin')) {
            echo "anda masuk ke dalam testadmin";
        } else {
            echo "anda tidak masuk ke dalam testadmin";
        }
        // echo "anda adalah admin";
    }
    public function testuser()
    {
        if (logged_in()) {
            echo user_id();
        } else {
            echo "belum login";
        }
        if (has_permission('testuseradmin')) {
            echo "anda masuk ke dalam testadmin";
        } else {
            echo "anda tidak masuk ke dalam testadmin";
        }
        // echo "anda adalah user";
    }
}
