@extends('layout')

@section('konten')

<h4 class="mb-3">edit produk</h4>
<form action="{{ route('produk.update',$produk->id) }}" method="POST" class="flex col g-3 mt-3" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">nama produk</label>
        <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control">
    </div>    
    <button type="submit" class="btn btn-primary mt-3">edit</button>
</form>
@endsection