<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class Dashboard extends Controller
// {
//     public function index(){
//         echo'you are login';
//     }

//     public function dashboard(){
//         return view('dashboard');
//     }
// }

// namespace App\Http\Controllers;

class Dashboard extends Controller
{
    public function index()
    {
        // You can add any necessary logic or data retrieval here
        
        // Assuming you have a view file named 'dashboard' in the 'dashboard' folder
        return view('dashboard.index');
    }
}

