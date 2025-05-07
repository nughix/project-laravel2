@extends('layout')

@section('konten')

<h4 class="mt-3">edit kategori</h4>

<form action="{{ route('kategori.update', $kategori->id) }}" method="post" class="row g-3 mt-3">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">nama kategori</label>
        <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3">edit</button>
</form>
@endsection