<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('head')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm">
        <div class="container d-flex flex-column flex-md-row align-items-center pb-2 mb-2 gap-3">
            <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                <span class="fs-4">Mahasiswa</span>
            </a>
            <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                <span class="fs-4">Dosen</span>
            </a>
            <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                <span class="fs-4">Mata Kuliah</span>
            </a>
            <a href="/" class="d-flex align-items-center text-white text-decoration-none">
                <span class="fs-4">Nilai</span>
            </a>
        </div>
    </nav>

    <main class="container">
        @include('komponen.pesan')
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
