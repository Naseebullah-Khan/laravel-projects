<?php

namespace App\Http\Controllers;

use App\Models\MyBlog;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = MyBlog::ActiveBlogs()->get();

        return $blogs;
    }

    public function about(): View
    {
        return view("about.index");
    }
}
