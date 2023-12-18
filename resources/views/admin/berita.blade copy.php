@extends('layouts.admin')

@section('title')
Berita
@endsection

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="container mt-4">

        <h1>Admin Berita</h1>
        <a
            type="button"
            href="{{url('/adm/berita/create')}}"
            class="btn btn-success mb-3">+ Tambah Berita</a>

        <div class="d-flex flex-wrap">
            @foreach($news as $berita)
            <div class="card w-50 ">
                <div class="card-body">
                    <h5 class="card-title">{{ $berita->name }}</h5>
                    <p class="card-text">{{ $berita->created_at }}</p>
                    <p class="card-text">{{ $berita->desc }}</p>
                    <p>{{$berita->image}}</p>
                    <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->name }}" style="max-width: 200px;">
                    <div class="d-flex flex-row gap-3">
                        <a href="/adm/berita/{{$berita->id}}" class="btn btn-primary">Preview</a>
                        <a href="/adm/berita/{{$berita->id}}/edit" class="btn btn-warning">Update</a>
                    </div>
                </div></div>
            </div>
            @endforeach
        </div>

    </div>
</main>

@endsection
