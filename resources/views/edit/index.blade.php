@extends('dashboard/apk')
@section('konten2')
<div class="py-4">
    <div class="card border-primary mb-3">
        <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg">
            <div class="card-body">
                <h2>Tambah Produk</h2>
                @foreach ($barangs as $brg)
                <form action="{{ '/manage/'.$brg->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="produk" class="form-label">Nama Produk</label>
                        <input type="text" name="barang" class="form-control" id="barang"
                            aria-describedby="emailHelp" value={{ $brg->nama_barang }}>
                    </div>
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode Produk</label>
                        <input type="text" name="kode" class="form-control" id="kode" value={{ $brg->kode_barang }}>
                    </div>
                    <div class="mb-3">
                        <label for="harga_produk" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" id="harga" value={{ $brg->harga }}>
                    </div>
                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
@endsection