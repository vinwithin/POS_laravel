@extends('dashboard/apk')
@section('konten6')
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('img/curved0.jpg'); background-position-y: 50%;">
      <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
      <div class="row gx-4">
       
        <div class="col-auto">
          <div class="avatar width-100  avatar-xxl position-relative mt-3 ml-2">
            
              
            @if (auth()->user()->image)

            <img   src="{{ asset('storage/'.auth()->user()->image) }}" alt="profile_image" class="w-100 h-100 border-radius-lg shadow-sm" onclick="preview()">
            @endif
          </div>
        </div>
       
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{ auth()->user()->name }}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              {{ auth()->user()->email }}
            </p>
            
          </div>
        </div>
        <div class="col-auto my-auto">
          <form action="profil/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
            <label class="form-label" for="inputImage">Pilih Foto:</label>
            <input type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror ">
            @error('image')
             <span class="text-danger">{{ $message }}</span>
              @enderror
              <button type="submit" class="btn btn-success mt-2">Upload</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-xl-4 mt-4 pb-5" style="margin-left: 50px" >
    <div class="card h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-8 d-flex align-items-center">
            <h6 class="mb-0">Profile Information</h6>
          </div>
          <div class="col-md-4 text-end">
            <a href="transaksi">
              <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <p class="text-sm">
          Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
        </p>
        <hr class="horizontal gray-light my-4">
        <ul class="list-group">
          <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp;{{ auth()->user()->name }} </li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp;{{ auth()->user()->email }}</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; USA</li>
          <li class="list-group-item border-0 ps-0 pb-0">
            <strong class="text-dark text-sm">Social:</strong> &nbsp;
            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
              <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
              <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
              <i class="fab fa-instagram fa-lg"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <script>
    
  </script>
@endsection