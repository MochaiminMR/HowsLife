<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Berita</title>
            <!-- Css -->
    <link href="{{asset('bootstrap-5/css/bootstrap.min.css')}}" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Js -->
    <script src="{{asset('bootstrap-5/js/bootstrap.bundle.min.js')}}"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container mt-5">
            <h2 class="mb-2">Update berita</h2>
            <form action="{{url("adm/berita/$berita->id")}}" method="POST" class="form-control">

            @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="nama_Berita" class="form-label">Nama Berita</label>
                    <input type="text" class="form-control" name="name" value="{{$berita->name}}" id="nama_Berita">
                </div>
                <div class="mb-3">
                    <label for="desc_berita" class="form-label">Deskripsi Berita</label>
                    <textarea class="form-control" name="desc" id="desc_berita">{{$berita->desc}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <form action="{{url("adm/berita/$berita->id/delete")}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </body>
</html>
