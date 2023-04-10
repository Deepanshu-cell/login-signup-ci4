<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();

        if($session->get('loggedIn')){
            return redirect()->to('/home');
        }else{
            return redirect()->to('/login');
        }
    }
}
