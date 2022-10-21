<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $data = [
            'title' => ""
        ];

        return view("index", $data);
    }

    public function about()
    {
        $data = [
            'title' => "About | "
        ];

        return view("about", $data);
    }

    public function store()
    {
        $data = [
            'title' => "Store | "
        ];

        return view("store", $data);
    }
}
