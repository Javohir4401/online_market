<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $top_banners = Banner::query()
                ->where('position', 'top')
                    ->get();

        $middleBanner = Banner::query()
            ->where('position', 'middle')
                ->orderByDesc('id')
                    ->first();

        $adsBanners = Banner::query()
                ->where('position', 'ads')
                    ->get();

        $bottomBanner = Banner::query()
                ->where('position', 'bottom')
                    ->orderByDesc('id')
                        ->first();

        $categories = Category::query()
            ->orderBy('id', 'DESC')
                ->with(['images', 'parent'])
                    ->get();

        $latestPosts = Post::query()
            ->orderBy('id', 'DESC')
                ->with('postCategory')
                    ->limit(10)
                        ->get();

        return view('home', [
            'top_banners' => $top_banners,
            'middleBanner' => $middleBanner,
            'adsBanners' => $adsBanners,
            'bottomBanner' => $bottomBanner,
            'categories' => $categories,
            'latestPosts' => $latestPosts,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
