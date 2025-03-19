<?php

use App\Http\Controllers\MiddlewareTestingController;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\State;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

Route::get('/', function (): View {
    return view('welcome');
});

Route::get("/users", function (): View {

    $users = User::all();
    $addresses = Address::all();

    return view("test", compact("users", "addresses"));
});

Route::get("/posts", function (): View {
    // Post::insert([
    //     [
    //         "user_id" => 1,
    //         "title" => "Learn Java",
    //     ],
    //     [
    //         "user_id" => 5,
    //         "title" => "Learn C++",
    //     ],
    //     [
    //         "user_id" => 2,
    //         "title" => "Learn C#",
    //     ],
    //     [
    //         "user_id" => 1,
    //         "title" => "Learn C",
    //     ],
    //     [
    //         "user_id" => 5,
    //         "title" => "Learn Python",
    //     ],
    // ]);

    // Tag::insert([
    //     [
    //         "name" => ".NET"
    //     ],
    //     [
    //         "name" => "Django"
    //     ],
    //     [
    //         "name" => "Spring Boot"
    //     ],
    //     [
    //         "name" => "C Framework"
    //     ],
    //     [
    //         "name" => "C# Framework"
    //     ],
    // ]);

    # add a tag to post using attach method
    // $post = Post::find(5);
    // $tag = Tag::find(1);
    // $post->tags()->attach($tag);
    # remove a tag from post using detach method
    // $post->tags()->detach($tag);
    # remove all tags and add new one or ones using sync method
    // $post->tags()->sync($tag);

    $posts = Post::all();
    return view("posts", compact("posts"));
});

Route::get("/tags", function (): View {

    $tags = Tag::all();

    return view("tags", compact("tags"));
});

Route::get("/location", function (): View {

    // $country = new Country(["name" => "Afghanistan"]);
    // $country->save();

    // $state = new State(["name" => "South"]);
    // $country->states()->save($state);

    // $kandaharCity = new City(["name" => "Kandahar"]);
    // $helmandCity = new City(["name" => "Helmand"]);
    // $state->cities()->saveMany([$kandaharCity, $helmandCity]);

    $country = Country::first();

    return view("location", compact("country"));
});

Route::get("/image", function () {

    // $user = User::findOrFail(10);
    // $user->image()->create(["path" => "/uploads/user_image.jpg"]);

    // return $user->image;

    $post = Post::findOrFail(4);
    // $post->image()->create(["path" => "/uploads/post_image.jpg"]);

    return $post->image;
});

Route::get("/middlewareTesting", [MiddlewareTestingController::class, "index"])->name("middlewareTesting.index");
Route::post("/middlewareTesting", [MiddlewareTestingController::class, "store"])->name("middlewareTesting.store")
    ->middleware(CheckRoleMiddleware::class);
