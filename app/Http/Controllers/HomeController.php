<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
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

        return view('home', [
            'top_banners' => $top_banners,
            'middleBanner' => $middleBanner,
            'adsBanners' => $adsBanners,
            'bottomBanner' => $bottomBanner,
            'categories' => $categories,
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
