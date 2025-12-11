<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\BlogStoreRequest;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    public function index(): JsonResponse
    {
        $blogs = Blog::all();
        return response()->json($blogs);
    }

    public function store(BlogStoreRequest $request): JsonResponse
    {
        $post = new Blog();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->author_id = $request->author_id;
        $post->save();
        return response()->json($post, 201);
    }

    public function show(int $id): JsonResponse
    {
        $blog = Blog::findOrFail($id);
        return response()->json($blog, 200);
    }

    public function update(BlogStoreRequest $request, int $id): JsonResponse
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->author_id = $request->author_id;
        $blog->update();
        return response()->json(["message" => "Blog updated successfully"], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return response()->json(["message" => "Blog deleted successfully"], 200);
    }
}
