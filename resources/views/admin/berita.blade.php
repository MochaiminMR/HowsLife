@extends('layouts.admin')

@section('title', 'Admin Berita')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4" style="z-index: 2;">
        <h1 class="">Admin Berita</h1>
        <a type="button" href="{{ url('/adm/berita/create') }}" class="btn text-white mb-3" style="background-color:#27A2C2;">+ Tambah Berita</a>

        <div class="d-flex flex-wrap gx-3">
            @foreach($news as $berita)


        <div class="card mx-3 my-2"
            style="width: 320px; border: none; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <!-- Displaying the image -->
            <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->name }}"
                style="width: 100%; height: 100%; object-fit: cover; object-position: center;"
                class="rounded-3 rounded-top-left rounded-bottom-left img-fluid">

            <div class="card-body" style="background: rgba(255, 255, 255, 0.8); padding: 1rem;">
                <h5 class="card-title">{{ $berita->name }}</h5>
                <p class="card-text">{{ $berita->desc }}</p>

                <div class="d-flex flex-row gap-3">
                    <a href="/adm/berita/{{ $berita->id }}" class="btn btn-primary">Preview</a>
                    <a href="/adm/berita/{{ $berita->id }}/edit" class="btn btn-warning">Update</a>
                </div>
            </div>
        </div>



            @endforeach
        </div>
    </div>
</main>
@endsection
