@extends('layouts.app')

@section('notification')
<div class="container mx-auto pt-4" id="notification">
    <div class="d-flex justify-content-between align-items-center bg-warning border rounded-sm">
        @guest
            <h4 class="m-3">Selamat Datang di Zona Berita</h4>
        @else
            <h4 class="m-3">Halo {{ Auth::user()->name }}</h4>
        @endguest
        <a class="btn" id="hide-notification">X</a>
    </div>
</div>
@endsection

@section('content')
<div class="container mx-auto">
    <div class="row">
        <div class="col-md-8">
            <div class="d-flex align-items-center border rounded-sm justify-content-between bg-white">
                <h2 class="m-3">Berita Terbaru</h2>
                <div class="p-3">
                    @if (Auth::check() && (Auth::user()->role == "partner"))
                        <a href="{{ route('index_berita')}}" class="btn btn-danger">Berita Saya</a>
                    @elseif (Auth::check() && (Auth::user()->role == "admin"))
                        <a href="{{ route('index_berita')}}" class="btn btn-danger">Lihat Berita</a>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                @foreach ($berita as $b_item)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/beritas/'.$b_item->gambar)}}" class="img-fluid" alt="<0_0> Ini Gambar">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$b_item->judul}}</h5>
                                <p class="card-text">
                                    @if(strlen($b_item->deskripsi) > 50)
                                        {{ strip_tags(substr($b_item->deskripsi, 0, 50)) . ' ...'}}
                                    @else
                                    {{ strip_tags($b_item->deskripsi)}}
                                    @endif
                                <div class="d-flex justify-content-between">
                                    <p class="card-text"><small class="text-muted">{{$b_item->kategori->name}}</small></p>
                                    <p class="card-text"><small class="text-muted">{{$b_item->created_at}}</small></p>
                                    <a href="{{route('detail_berita', $b_item->id)}}" class="btn btn-primary">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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

            <div class="my-3 border rounded-sm bg-white d-flex align-items-center justify-content-center">
                <h4 class="m-3">Berita Terlama</h4>
            </div>

            @foreach($berita_terakhir as $bt_item)
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">{{$bt_item->judul}}</h5>
                    <p class="card-text" style="text-align: justify">
                        @if(strlen($bt_item->deskripsi) > 50)
                            {{ strip_tags(substr($bt_item->deskripsi, 0, 50)) . ' ...'}}
                        @else
                        {{ strip_tags($bt_item->deskripsi)}}
                        @endif
                    </p>
                    <p class="card-text"><small class="text-muted">{{$bt_item->created_at}}</small></p>
                    <a href="{{route('detail_berita', $bt_item->id)}}" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div>
            @endforeach
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