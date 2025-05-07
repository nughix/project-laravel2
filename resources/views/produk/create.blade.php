@extends('layout')

@section('konten')

<h4 class="mt-3">tambah produk</h4>

    <form action="{{ route('produk.store') }}" method="post" class="row g-3 mt-3" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-cotrol" rows="10"></textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">stok</label>
            <input type="number" class="form-control" name="stok">
        </div>
        <div class="col-md-6">
            <label class="form-label">gambar</label>
            <input type="file" name="nama_file" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label class="form-label">katehgori</label>
            <select name="kategori_id" id="kategori_id" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
    </form>
@endsection