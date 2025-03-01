<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index(): View
    {
        return view("File.index");
    }

    public function store(Request $request): void
    {
        # Two ways to store files

        # 1. Storage Facade (Longer Version)
        #    disk() -> where to store file
        #    put() -> rootPath and file name
        // $file = Storage::disk("local")->put("/", $request->file("file"));

        # 2. Short Version
        // $file = $request->file("file")->store("/", "local"); # this should be stored locally and can not be accessed by public
        $file = $request->file("file")->store("/", "public"); # this should be stored locally and can be accessed by public if we link it with root public folder of laravel project
        dd($file);
    }
}
