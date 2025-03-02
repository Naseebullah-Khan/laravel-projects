<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Str;
# main use case -> for manipulating the file
use Illuminate\Support\Facades\File as FileFacades; # but we are gonna use it for deleting the file

class FileUploadController extends Controller
{
    public function index(): View
    {
        # in order to delete the file first you have to get the path to the file then using that path delete the file in local storage then delete the path from the database
        # do not delete the path before deleting the file

        # Deleting file procedure
        # 1. get the path
        $file = File::where("id", 17)->get()->first();
        # 2. delete the file from storage using FileFacades
        FileFacades::delete(public_path($file->file_path));
        # 3. delete the path from database
        $file->delete();

        $files = File::all();
        return view("File.index", ["files" => $files]);
    }

    public function store(Request $request): void
    {
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
