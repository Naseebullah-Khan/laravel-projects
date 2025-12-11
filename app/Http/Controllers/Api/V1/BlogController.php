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
}
