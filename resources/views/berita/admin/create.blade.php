@extends('adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buat Berita</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Buat Berita</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
        <form action="{{ route('simpan_berita')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <?php $user_id = Auth::user()->id ?>
            <input type="number" name="id_penulis" id="id_penulis" class="form-control" value="{{$user_id}}" hidden>
            <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
            </div>
            @error('gambar')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Judul">
            </div>
            @error('judul')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
            <div class="form-group">
                <label for="">Kategori</label>
                <select name="id_kategori" id="id_kategori" class="form-control">
                    @foreach($kategori as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea type="text" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5"></textarea>
            </div>
            @error('deskripsi')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
            <div class="d-flex justify-content-end" style="gap: 5px">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-success">Buat</button>
            </div>
        </form>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('scripts')
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('deskripsi');
  </script>
@endsection