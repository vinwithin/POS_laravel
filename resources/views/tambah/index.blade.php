@extends('dashboard/apk')
@section('konten1')
@if (auth()->user()->can('input produk'))
<div class="py-4">
  <div class="card border-primary mb-3">
      <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg">
          <div class="card-body">
              <h2>Tambah Produk</h2>
              <form action="manage/create" method="get">
                  @csrf
                  <div class="mb-3">
                      <label for="produk" class="form-label">Nama Produk</label>
                      <input type="text" name="barang" class="form-control" id="barang"
                          aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                      <label for="kode" class="form-label">Kode Produk</label>
                      <input type="text" name="kode" class="form-control" id="kode">
                  </div>
                  <div class="mb-3">
                      <label for="harga_produk" class="form-label">Harga</label>
                      <input type="text" name="harga" class="form-control" id="harga">
                  </div>
                  <div class="mb-3">
                      <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
                      <input type="text" name="jumlah" class="form-control" id="jumlah">
                  </div>
                  <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
          </div>
      </div>
    @endif
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Tabel Produk</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Barang</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Barang</th>
                    <th class="text-secondary opacity-7">Jumlah Produk</th>
                    <th class="text-secondary opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($barangs as $brg)
                  <tr>
                    <td class="ps-4">{{ $loop->iteration }}</td>
                    <td class="ps-2">{{ $brg->nama_barang }}</td>
                    <td class="ps-6">{{ $brg->kode_barang }}</td>
                    <td class="ps-8">Rp. {{  $brg->harga }}</td>
                    <td class="ps-4">{{  $brg->jumlahBarang }}</td>
                    @if (auth()->user()->can('delete produk'))
                    <td><a href="manage/{{ $brg->id }}/edit" class="btn btn-warning">Edit</a>
                      <form class="d-inline" action="manage/{{ $brg->id }}" method="post">
                        @method('DELETE')
                        @csrf
                      <button class="btn btn-danger">Hapus</button>
                    </form>
                  </td>
                      @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">MASBROH TEAM</a>
              for a task web course.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://github.com/vinwithin" class="nav-link text-muted" target="_blank">GITHUB</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
@endsection