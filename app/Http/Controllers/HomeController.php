<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recentAlbums = Album::all()->sortByDesc('updated_at');
        return view('home',compact('recentAlbums'));
    }
}
