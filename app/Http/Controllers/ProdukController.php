<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::get();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|min:3|max:225',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'nama_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);
        // proses upload file
        if ($request->hasFile('nama_file')){
            $file = $request->file('nama_file');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'),$namaFile);
        }
        Produk::create([
            'nama_produk' => $validated['nama_produk'],
            'deskripsi' => $validated ['deskripsi'],
            'harga' => $validated ['harga'],
            'stok' => $validated ['stok'],
            'nama_file' =>$namaFile,
            'kategori_id' => $validated ['kategori_id'],
        ]);

        Produk::create($validated);
        session::flash('success','Create Produk Successfully');
        return redirect()->route('produk.index');
    }

    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|min:3|max:225',
        ]);
        $produk->update($validated);
        session::flash('success','Create Produk Successfully');
        return redirect()->route('produk.index');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        session::flash('success','delete Produk Successfully');
        return redirect()->route('produk.index')->with('success','produk deleted successfuly');
    } 
}
