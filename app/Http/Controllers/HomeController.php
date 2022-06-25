<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $list = Movie::all();
        $Count_movies = Movie::all()->count();
        $Count_movies_ht = Movie::where('status', '1')->count();
        $Count_movies_kht = Movie::where('status', '0')->count();

        $Count_category = Category::all()->count();
        $Count_category_ht = Category::where('status', '1')->count();
        $Count_category_kht = Category::where('status', '0')->count();


        $Count_genre = Genre::all()->count();
        $Count_genre_ht = Genre::where('status', '1')->count();
        $Count_genre_kht = Genre::where('status', '0')->count();


        $Count_country = Country::all()->count();
        $Count_country_ht = Country::where('status', '1')->count();
        $Count_country_kht = Country::where('status', '0')->count();

        return view('home', compact('Count_movies', 'Count_category', 'Count_genre', 'Count_country', 'list', 'Count_movies_ht', 'Count_movies_kht', 'Count_genre_ht', 'Count_genre_kht','Count_country_ht','Count_country_kht','Count_category_kht','Count_category_ht'));
    }
}
