<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $berita = Berita::orderBy('id', 'desc')->take(6)->get();
        $berita_terakhir = Berita::orderBy('id', 'asc')->take(3)->get();
        $kategori = Kategori::all();
        return view('welcome', compact(['berita','berita_terakhir','kategori']));
    }

    public function berita() {
        $berita = Berita::orderBy('id', 'desc')->get();
        return view('berita.index', compact("berita"));
    }
}
