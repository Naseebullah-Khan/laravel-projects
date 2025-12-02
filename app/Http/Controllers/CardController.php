<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\View\View;

class CardController extends Controller
{
    public function show(): View
    {
        // if (!in_array(request("locale"), ["en", "da", "pu"])) {
        //     dd("Invalid locale");
        // }

        $cardsInfo = Card::all();
        // $this->insertCardInfo("Unlocking the Power of Artisan: Real-Time Command", "Explore how to enhance your Laravel applications by integrating real-time Artisan command outputs directly into your DOM. This guide walks you through the steps to create dynamic.");
        // $this->insertCardInfo("Building Your Own Voice Assistant with JavaScript and ChatGPT", "Dive into the world of AI-powered applications with this tutorial on creating a custom voice assistant using JavaScript and ChatGPT. Learn how to bring interactive voice features to your web projects, making them more engaging and user-friendly.");
        app()->setLocale(request("locale"));
        return view("welcome", compact("cardsInfo"));
    }

    public function insertCardInfo(string $title, string $description): void
    {
        $cardInfo = new Card();
        $cardInfo->title = $title;
        $cardInfo->description = $description;
        $cardInfo->save();
    }
}
