<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index() {
        if (Auth::user()->role == "admin") {
            $berita = Berita::orderBy('created_at','desc')->get();
            return view("berita.admin.index", compact("berita"));
        } else if (Auth::user()->role == "partner") {
            $partner_id = Auth::user()->id;
            $berita = Berita::where("id_penulis", $partner_id)->orderBy('created_at','desc')->get();
            return view("berita.admin.index", compact("berita"));
        }
    }
    public function create() {
        $kategori = Kategori::all();
        return view('berita.admin.create', compact('kategori'));
    }
    public function store(Request $request) {
        
        $this->validate($request, [
            'id_penulis' => 'required|integer',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:10',
            'id_kategori' => 'required|integer',
        ]);
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/beritas', $gambar->hashName());
        
        Berita::create([
            'id_penulis' => $request->id_penulis,
            'id_kategori' => $request->id_kategori,
            'gambar' => $gambar->hashName(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('index_berita');
    }
    public function show(String $id) {
        $b = Berita::findOrFail($id);
        $berita = Berita::all();
        $kategori = Kategori::all();
        return view('berita.detail', compact(['b','berita','kategori']));
    }
    public function show_by_category(String $id) {
        $berita = Berita::where('id_kategori', $id)->get();
        return view('berita.index', compact('berita'));
    }
    public function edit(String $id) {
        $berita = Berita::findOrFail($id);
        $kategori = Kategori::all();
        return view('berita.admin.edit', compact(['berita','kategori']));
    }

    public function update(Request $request, String $id) {
        $this->validate($request, [
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:10',
            'id_kategori' => 'required|integer',
        ]);

        $berita = Berita::findOrFail($id);
        if($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/beritas', $gambar->hashName());
            Storage::delete('public/beritas/'. $berita->gambar);
            $berita->update([
                'id_kategori' => $request->id_kategori,
                'gambar' => $gambar->hashName(),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            $berita->update([
                'id_kategori' => $request->id_kategori,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect(route('index_berita'));
    }

    public function destroy(String $id) {
        $berita = Berita::findOrFail($id);
        Storage::delete('public/beritas'. $berita->gambar);
        $berita->delete();
        
        return redirect(route('index_berita'));
    }
}
