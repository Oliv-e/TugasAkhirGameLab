@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="row">
        <div class="col-md-8">
            <a href="{{route('lihat_berita')}}" class="btn btn-primary mb-2">Kembali</a>
            <div class="d-flex align-items-center border rounded-sm justify-content-between bg-white">
                <h2 class="m-3">{{$b->judul}}</h2>    
                <div class="p-3">
                    @if (Auth::check() && (Auth::user()->role == "partner"))
                        <a href="{{ route('index_berita')}}" class="btn btn-danger">Berita Saya</a>
                    @elseif (Auth::check() && (Auth::user()->role == "admin"))
                        <a href="{{ route('index_berita')}}" class="btn btn-danger">Lihat Berita</a>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-12 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/beritas/'.$b->gambar)}}" class="img-fluid" alt="<0_0> Ini Gambar">
                        </div>
                        <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text">
                                    {!! $b->deskripsi !!}
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="card-text"><small class="text-muted">Penulis : {{$b->penulis->name}}</small></p>
                                        <p class="card-text"><small class="text-muted">Kategori : {{$b->kategori->name}}</small></p>
                                    </div>
                                    <div>
                                        <p class="card-text"><small class="text-muted">Tanggal : {{$b->created_at}}</small></p>
                                        <p class="card-text"><small class="text-muted">Terakhir Diubah : {{$b->updated_at}}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Iklan :v</h5>
                    <div class="row mx-auto" style="gap: 5px;">
                        <img src="https://th.bing.com/th/id/OIP.BH5IL4lMtItExFO6ZpvkvAHaId?rs=1&pid=ImgDetMain" alt="Iklan" width="200px" class="img-fluid mx-auto">
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Kategori</h5>
                    <div class="row mx-auto" style="gap: 5px;">
                        @foreach($kategori as $k_item)
                            <a href="{{route('kategori_berita', $k_item->id)}}" class="btn btn-primary">{{$k_item->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#hide-notification').click(function(){
                $('#notification').hide();
            });
        });
    </script>
@endsection