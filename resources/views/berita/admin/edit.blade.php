@extends('adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Berita</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Berita</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
        <form action="{{ route('perbaharui_berita', $berita->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
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
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{$berita->judul}}">
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
                <textarea type="text" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5">{!!$berita->deskripsi!!}</textarea>
            </div>
            @error('deskripsi')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
            <div class="d-flex justify-content-end" style="gap: 5px">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-success">Edit</button>
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