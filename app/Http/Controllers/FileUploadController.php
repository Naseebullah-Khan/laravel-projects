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
        # Validation

        $request->validate([
            // "file" => ["required", "image"]
            "file" => ["required", "file", "mimes:zip,pdf,csv", "max:5000"]
        ]);

        $file = $request->file("file");
        $customName = "laravel_basic_" . Str::uuid();
        $extension = $file->getClientOriginalExtension(); // get file extension without dot like: image.phg => png not .png
        $fileNewName = $customName . "." . $extension;

        $path = $file->storeAs("/", $fileNewName, "custom_disk_public");

        $fileStore = new File();
        $fileStore->file_path = "/uploads/" . $path;
        $fileStore->save();

        dd("stored");
    }

    public function download()
    {
        # If you want to access the private folder files then this is the only approach.
        return Storage::disk("local")->download("6IpgElRvRVoFAmrY3TbUl4dLTR3gSKjUKVVJACcp.jpg");
    }
}
