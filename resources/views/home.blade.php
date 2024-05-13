@extends('adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Halaman Utama</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Halaman Utama</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Berita</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Total Berita : {{$berita->count()}}</h6>
                <p class="card-text">Mulai buat berita baru dengan mengeklik tombol dibawah ini.</p>
                <a href="{{route('index_berita')}}" class="btn btn-primary">Lihat Berita</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            @if (Auth::user()->role == "admin")
              <div class="card">
                <div class="card-header">
                  <h5 class="m-0">Kategori</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Total Kategori : {{$kategori->count()}}</h6>

                  <p class="card-text">Mulai buat berita baru dengan mengeklik tombol dibawah ini.</p>
                  <a href="{{route('index_kategori')}}" class="btn btn-primary">Lihat Kategori</a>
                </div>
              </div>
              @endif
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
