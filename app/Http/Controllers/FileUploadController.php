<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index(): View
    {
        $files = File::all();
        return view("File.index", ["files" => $files]);
    }

    public function store(Request $request): void
    {
        # Two ways to store files
        # in order to access the files in storage/public folder you have to link the root public folder to storage/public folder by using this command php artisan storage:link

        # 1. Storage Facade (Longer Version)
        #    disk() -> where to store file
        #    put() -> rootPath and file name
        // $file = Storage::disk("local")->put("/", $request->file("file"));

        # 2. Short Version
        // $file = $request->file("file")->store("/", "local"); # this should be stored locally and can not be accessed by public
        $file = $request->file("file")->store("/", "public"); # this should be stored locally and can be accessed by public if we link it with root public folder of laravel project

        $fileStore = new File();
        $fileStore->file_path = $file;
        $fileStore->save();

        dd("stored");
    }

    public function download()
    {
        # If you want to access the private folder files then this is the only approach.
        return Storage::disk("local")->download("uCq6oEbD6CLipde1NOb1TIi4tujg6a8m0MJhOzf4.jpg");
    }
}
