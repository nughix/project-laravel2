<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();
        return view('kategori.index', compact('kategori'));
    }
    public function create()
    {
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|min:3|max:225',
        ]);
        Kategori::create($validated);
        session::flash('success','Create Kategori Successfully');
        return redirect()->route('kategori.index');
    }
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }
    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|min:3|max:225',
        ]);
        $kategori->update($validated);
        session::flash('success','Update Kategori Successfully');
        return redirect()->route('kategori.index');
    }
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        session::flash('success','Delete Kategori Successfully');
        return redirect()->route('kategori.index');
    }
}
