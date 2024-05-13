<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $kategori = Kategori::all();
        return view("kategori.admin.index", compact("kategori"));
    }
    public function create() {
        return view('kategori.admin.create');
    }
    public function store(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'deskripsi' => 'required',
        ]);
        Kategori::create([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('index_kategori');
    }
    public function edit(String $id) {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.admin.edit', compact('kategori'));
    }

    public function update(Request $request, String $id) {
        $this->validate($request, [
            'name' => 'required',
            'deskripsi' => 'required',
        ]);

        $kategori = kategori::findOrFail($id);

        $kategori->update([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect(route('index_kategori'));
    }

    public function destroy(String $id) {        
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        $kategori_tersedia = Kategori::first();
        Berita::where('id_kategori', $id)->update(['id_kategori' => $kategori_tersedia->id]);
        return redirect(route('index_kategori'));
    }
}
