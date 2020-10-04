<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Title</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    </head>
    <body>
        <header class="bg-dark p-2 text-center shadow">
            <div class="container pt-1 pb-1">
                <h1 class="text-white">TypeQast - Zadaci</h1>
            </div>
            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link" href="#">People</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Planets</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Starships</a></li>
            </ul>
        </header>
        <section>
            <div class="container mt-4">
                @yield('content')
            </div>
        </section>
    </body>
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" charset="utf-8"></script>
    @yield('js')
</html>
