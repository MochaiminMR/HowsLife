@extends('layouts.admin')

@section('title')
Curhat
@endsection

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h1 class="tes-aja">Admin Curhat</h1>

        @foreach($curhats as $curhat)
        <div class="mb-3 card {{ $curhat->active == 1 ? 'bg-info' : '' }}">
            <div class="card-body">
                <h5 class="card-title">Pesan</h5>
                <p class="text-white">Pesan sudah di acc</p>
                <p class="card-text">{{ $curhat->pesan }}.</p>

                {{-- Check if active is 0 --}}
                @if($curhat->active == 0)
                <form action="{{ url("adm/curhat/$curhat->id") }}" method="POST" class="form-control">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-primary">Acc</button>
                </form>
                @else
                <button type="button" class="btn btn-success" disabled>Acc</button>
                @endif

                <!-- Modal for Delete -->
                <div class="modal fade" id="confirmDeleteModal{{ $curhat->id }}" tabindex="-1"
                    aria-labelledby="confirmDeleteModalLabel{{ $curhat->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel{{ $curhat->id }}">Konfirmasi
                                    Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus pesan ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak
                                </button>
                                <form action="{{ url("adm/curhat/$curhat->id/delete") }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#confirmDeleteModal{{ $curhat->id }}">
                    Delete
                </button>
            </div>
        </div>

        {{-- Alert and badge for success --}}
        @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
        @endif
        @endforeach
    </div>
</main>
@endsection
