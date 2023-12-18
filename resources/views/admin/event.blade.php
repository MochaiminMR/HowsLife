@extends('layouts.admin') @section('title') Dashboard @endsection
@section('content')
<main class="col-md-8 ms-sm-auto col-lg-10 px-md-4">

    <div class="container mt-4">

        <h1>Admin Event</h1>
        <a
            type="button"
            href="{{url('/adm/event/create')}}"
            class="mb-4 btn text-white" style="background-color:#27A2C2;">+ Tambah Event</a>

        @foreach ($eventeuy as $event)
        <div class="card mb-3 border-0 shadow" style="max-width: 1000px;">
            <div class="row gx-3 align-items-center">
                <div class="col-md-4 pl-3">
                    <img
                        src="{{ asset('storage/' . $event->image) }}"
                        alt="{{ $event->name }}"
                        style="width: 100%; height: 280px; object-fit: cover; object-position: center;"
                        class="rounded-3 rounded-top-left rounded-bottom-left img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p  class="text-decoration-none badge bg-warning mb-2">{{$event->category}}</p>
                        <h3 class="card-title font-bold">{{$event->name}}</h3>
                        <p class="card-text text-secondary" style="max-width: 600px;">{{$event->desc}}</p>
                        <!-- Set the max-width value as per your requirement -->
                        <p class="card-text">
                            <small class="text-body-secondary">{{$event->time}}</small>
                        </p>

                        <div class="d-flex flex-row gap-3">
                            <a href="/adm/event/{{$event->id}}" class="btn btn-primary">Preview</a>
                            <a href=" /adm/event/{{$event->id}}/edit" class="btn btn-warning">Update</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</main>
@endsection
