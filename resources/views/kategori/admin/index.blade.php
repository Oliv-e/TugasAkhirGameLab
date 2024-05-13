@extends('adminlte.layouts.app')
@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css">
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
        <div class="mb-2">
            <a href="{{route('buat_kategori')}}" class="btn btn-primary">Buat Kategori Baru</a>
        </div>
        <table class="table border" id="data-table">
            <thead>
                <tr class="bg-white">
                    <th class="text-center">NO</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">DESKRIPSI</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $item)
                    <tr>
                        <th class="text-center align-middle">{{$loop->index + 1}}</th>
                        <td class="text-center align-middle">{{$item->name}}</td>
                        <td class="text-center align-middle">{{$item->deskripsi}}</td>
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center" style="gap: 5px;">
                                <a href="{{route('kategori_berita', $item->id)}}" class="btn btn-secondary">Lihat</a>
                                <a href="{{route('edit_kategori' ,$item->id)}}" class="btn btn-warning">Edit</a>
                                <form method="GET" action="{{ route('hapus_kategori', $item->id) }}">
                                  @csrf
                                  <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap4.js"></script>
    <script>
      new DataTable('#data-table');
      $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Apakah kamu yakin ingin menghapus data ini?`,
            text: "Jika berita mengandung kategori yang di hapus, kategori berita tersebut akan di pindahkan!!!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
      });
    </script>
@endsection