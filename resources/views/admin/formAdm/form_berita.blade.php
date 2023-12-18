<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>

    <!-- Css -->
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Js -->
    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">

        <h2 class="mb-2">Tambah berita</h2>
        <!-- form_berita.blade.php -->
        <form action="{{ url('adm/berita') }}" method="POST" enctype="multipart/form-data" class="form-control">
            @csrf
            <div class="mb-3">
                <label for="nama_Berita" class="form-label">Nama Berita</label>
                <input type="text" class="form-control" name="name" id="nama_Berita">
            </div>
            <div class="mb-3">
                <label for="desc_berita" class="form-label">Deskripsi Berita</label>
                <textarea class="form-control" name="desc" id="desc_berita"></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar_berita" class="form-label">Gambar Berita</label>
                <input type="file" class="form-control" name="imageBerita" id="gambar_berita">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</body>

</html>
