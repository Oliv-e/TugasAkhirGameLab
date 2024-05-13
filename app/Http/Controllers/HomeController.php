<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == "partner") {
            $berita = Berita::where('id_penulis', '=', Auth::user()->id);
            return view('home', compact('berita'));
        } else if (Auth::user()->role == "admin") {
            $berita = Berita::all();
            $kategori = Kategori::all();
            return view('home', compact(['berita','kategori']));
        }
        return view('welcome');
    }
}
