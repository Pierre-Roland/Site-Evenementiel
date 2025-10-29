<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function home()
    {
        return view('welcome');
    }

    public function process(Request $request)
    {
        $data = $request->input('name');
        $result = strtoupper($data); 
        return response()->json(['result' => $result]);
    }
}
