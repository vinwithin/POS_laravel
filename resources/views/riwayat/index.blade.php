@extends('dashboard/apk')
@section('konten5')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Riwayat Penjualan</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>        
                    <th class="text-secondary opacity-7">Total Penjualan</th>
                    <th class="text-secondary opacity-7">Tanggal Penjualan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($riwayats as $riwayat)
                  <tr>
                    <td class="ps-4">{{ $loop->iteration }}</td>
                    <td class="ps-4">Rp. {{  $riwayat->total_pembayaran }}</td>
                    <td class="ps-4">{{  $riwayat->created_at }}</td>
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