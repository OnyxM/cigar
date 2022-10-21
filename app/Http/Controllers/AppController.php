<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            'title' => "Store | ",
            'products' => Product::orderBy('id', "desc")->simplePaginate(15),
        ];

        return view("store", $data);
    }

    public function store_item($id, $slug)
    {
        $data = [
            'title' => "Product Details | ",
            'product' => Product::findOrFail($id),
            'other_products' => Product::where('id', '!=', $id)->orderBy('id', "desc")->simplePaginate(4)
        ];

        return view("store_item", $data);
    }
}
