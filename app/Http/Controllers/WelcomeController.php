<?php

namespace App\Http\Controllers;

use App\Models\User;

class WelcomeController
{
    public function __invoke()
    {
        dd(User::factory());

        return view("dashboard");  
    }
}
