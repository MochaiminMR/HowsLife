<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
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

        <form action="{{url("adm/event/$event->id")}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="tema_event" class="form-label">Tema Event</label>
                <input type="text" class="form-control" name="theme" value="{{$event->theme}}" id="tema_event">
            </div>
            <div class="mb-3">
                <label for="nama_event" class="form-label">Nama Event</label>
                <input type="text" class="form-control" name="name" value="{{$event->name}}" id="nama_event">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori Kelas</label>
                <select class="form-select form-control" name="category" id="category"
                    aria-label="Default select example">
                    <option name="category"value="Kelas Konseling" selected="selected">Kelas Konseling</option>
                    <option name="category" value="Webinar">Webinar</option>
                    <option name="category" value="Talk show">Talk Show</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="time_event" class="form-label">Time</label>
                <input type="date" class="form-control" name="time" id="time_event" value="{{$event->time}}">
            </div>

            <div class="mb-3">
                <label for="desc_event" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="desc" id="desc_event">{{$event->desc}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <form action="{{url("adm/event/$event->id/delete")}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

    </div>
</body>

</html>
