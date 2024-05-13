@extends('adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
        <form action="{{ route('perbaharui_kategori', $kategori->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$kategori->name}}">
            </div>
            @error('name')
              <div class="alert alert-danger mt-2">
                {{$message}}
              </div>
            @enderror
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea type="text" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5">{!!$kategori->deskripsi!!}</textarea>
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