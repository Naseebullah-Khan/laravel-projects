<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\BlogStoreRequest;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $blogs = Blog::all();

        return response()->json($blogs, 200);
    }

    /**
     * Search for blogs by title.
     */

    public function search(Request $request): JsonResponse
    {
        if ($request->has("q")) {
            $blogs = Blog::where("title", "LIKE", "%" . $request->q . "%")->get();

            return response()->json($blogs, 200);
        }

        return response()->json([], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogStoreRequest $request): JsonResponse
    {
        $new_blog = new Blog();
        $new_blog->title = $request->title;
        $new_blog->description = $request->description;
        $new_blog->author_id = $request->author_id;
        $new_blog->save();

        return response()->json($new_blog, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return response()->json($blog, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogStoreRequest $request, Blog $blog): JsonResponse
    {
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->author_id = $request->author_id;
        $blog->update();

        return response()->json(["message" => "Updated Successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): JsonResponse
    {
        $blog->delete();

        return response()->json(["message" => "Deleted Successfully"], 200);
    }
}
