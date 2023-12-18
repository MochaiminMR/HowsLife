<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sidebars · Bootstrap v5.2</title>

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Css -->
    <link href="{{asset('bootstrap-5/css/bootstrap.min.css')}}" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/sidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
</head>

<body>

    <main class="col-md-3 sidebar d-flex flex-nowrap fixed-top" style="z-index: 0;">
        <h1 class="visually-hidden">Sidebars</h1>

        <div class="d-flex flex-column flex-shrink-0 p-3"
            style="width: 200px; height: 100vh; background-color: #27A2C2;">

            <img src="{{ asset('aset/logo.png') }}" alt="Deskripsi Gambar">
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{url('adm/')}}" class="nav-link text-white" aria-current="page">
                        <span data-feather="home" class="align-text-bottom"></span>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{url('adm/berita')}}" class="nav-link text-white">
                        <span data-feather="edit" class="align-text-bottom"></span>
                        Berita
                    </a>
                </li>
                <li>
                    <a href="{{url('adm/event')}}" class="nav-link text-white">
                        <span data-feather="pen-tool" class="align-text-bottom"></span>
                        Events
                    </a>
                </li>
                <li>
                    <a href="{{url('adm/curhat')}}" class="nav-link text-white">
                        <span data-feather="users" class="align-text-bottom"></span>
                        Curhat
                    </a>
                </li>
            </ul>
        </div>

    </main>
    <div style="z-index: 2;">
        @yield('content')

    </div>


    <!-- Js -->
    <script src="{{asset('bootstrap-5/js/bootstrap.bundle.min.js')}}"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>

    <!-- Add jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
                // Handle click event using event delegation
                $(document).on('click', '.nav-link', function () {
                    // Remove the 'active' class from all nav links
                    $('.nav-link').removeClass('active');

                    // Add the 'active' class to the clicked nav link
                    $(this).addClass('active');
                });
            });

    </script>

</body>

</html>
