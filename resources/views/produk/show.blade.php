@extends('layout')

@section('konten')
<div class="container">
    <h1>Detail Produk</h1>
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('img/' . $produk->nama_file) }}" alt="{{ $produk->nama_produk }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h2>{{ $produk->nama_produk }}</h2>
                    <p><strong>Deskripsi:</strong> {{ $produk->deskripsi }}</p>
                    <p><strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <p><strong>Stok:</strong> {{ $produk->stok }}</p>
                    <p><strong>Kategori:</strong> {{ $produk->Kategori->nama_kategori ?? 'Tidak ada kategori' }}</p>
                    
                    <a href="{{ route('produk.index') }}" class="btn btn-primary">Kembali ke Daftar Produk</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection