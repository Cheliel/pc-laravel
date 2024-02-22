<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{@asset('/assets/css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>

    <h1>@yield('page-title')</h1>
    @include('components.menu')
    <section>
        @yield('content')
    </section>

</body>
</html>
