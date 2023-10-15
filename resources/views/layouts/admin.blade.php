<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/img/alumnilogo.png') }}" rel="icon">
    <title>Dashboard - Mazer Admin Dashboard</title>
    @include('layouts.style')
</head>

<body>
    <div id="app">
        @include('layouts.navigation')
     
            
            @yield('content')

         
        </div>
    </div>
    @include('layouts.scripts')
</body>

</html>