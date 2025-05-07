@extends('layout')

@section('konten')
@session('success')
<script>
Swal.fire({
  title: "Selamat Berhasil Melakukan Perintah",
  width: 600,
  padding: "3em",
  color: "#716add",
  background: "#fff url(/images/trees.png)",
  backdrop: `
    rgba(0,0,123,0.4)
    url("/img/nyan-cat.gif")
    left top
    no-repeat
  `
});
</script>
@endsession
<div class="d-flex">
    <h4>Daftar Kategori</h4>
    <div class="ms-auto">
        <a href="{{ route('kategori.create') }}" class="btn btn-success">Tambah Kategori</a>
    </div>
</div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

    <tbody>
        @foreach ($kategori as $no => $kategori)
        <tr>
            <td>{{ $no + 1 }}</td>
            <td>{{ $kategori->nama_kategori }}</td>
            <td>
                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="post">
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning">edit</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">hapus</button>
                </form>
            </td>
        </tr>
            
        @endforeach
    </tbody>
</table>
@endsection