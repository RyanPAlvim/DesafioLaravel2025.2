<?php

namespace App\Http\Controllers;

use App\Models\User;

class WelcomeController
{
    public function index()
    {
        return view("welcome");  
    }
}
