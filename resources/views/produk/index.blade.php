@extends('layout')

@section('konten')
@session('success')
<script>
Swal.fire({
  title: "Custom width, padding, color, background.",
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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Daftar Produk</h4>
        <a class="btn btn-success" href="{{ route('produk.create') }}">
            <i class="fas fa-plus"></i> Tambah Produk



        </a>
    </div>

    <div class="row">
        @foreach ($produk as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($item->nama_file)
                        <img src="{{ asset('img/' . $item->nama_file) }}" class="card-img-top" alt="{{ $item->nama_produk }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span class="text-muted">Tidak ada gambar</span>
                        </div>
                    @endif

                    <div class="position-absolute top-0 end-0 m-2">
                        <span class="badge bg-danger">{{ $item->kategori->nama_kategori }}</span>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_produk }}</h5>
                        
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-bold text-danger">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            <span class="badge bg-{{ $item->stok > 0 ? 'info' : 'danger' }}">
                                Stok: {{ $item->stok }}
                            </span>
                        </div>
                    </div>

                    <div class="card-footer bg-white">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <a href="{{ route('produk.show', $item->id) }}" class="btn btn-outline-info" title="Detail">
                                <i class="fas fa-eye me-1"></i> Detail
                            </a>
                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-outline-warning" title="Edit">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            <form action="{{ route('produk.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash me-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(method_exists($produk, 'hasPages') && $produk->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $produk->links() }}
        </div>
    @endif
@endsection