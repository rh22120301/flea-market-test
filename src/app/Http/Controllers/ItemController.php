<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'default');

        return view('index',compact('tab'));
    }

    public function profile()
    {
        return view('profile');
    }
}
