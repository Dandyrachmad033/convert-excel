<?php

namespace App\Controllers;
use App\Models\dbd;

class Home extends BaseController
{
    public function index()
    {
        $db = new dbd();
        $data['records'] = $db->findAll();
        return view('welcome_message',$data);
    }
}
