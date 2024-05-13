@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center border rounded-sm justify-content-between bg-white">
                <h2 class="m-3">Kumpulan Berita</h2>
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
                        <div class="col-md-4">
                            <img src="{{ asset('storage/beritas/'.$b_item->gambar)}}" class="img-fluid" alt="<0_0> Ini Gambar">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$b_item->judul}}</h5>
                                <p class="card-text">
                                    {!!$b_item->deskripsi!!}                                    
                                </p>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="card-text"><small class="text-muted">{{$b_item->penulis->name}}</small></p>
                                        <p class="card-text"><small class="text-muted">{{$b_item->created_at}}</small></p>
                                    </div>
                                    <div>
                                        <a href="{{route('detail_berita', $b_item->id)}}" class="btn btn-primary">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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