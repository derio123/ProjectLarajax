<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Ajax - @yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

</head>

<body>
    @section('sidebar')

    @show


    <div class="container">
        @yield('content')
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="text-center footer">
        <p>Teste</p>
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js">
    </script>
</body>

</html>
