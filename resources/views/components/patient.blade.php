<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home Page')</title>
    <script src="https://cdn.tailwindcss.com"></script>
     @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('asset/melogo.jpg') }}">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">

        @if(!isset($hideSidebar) || !$hideSidebar)
            @include('components.patientSidebar')
        @endif

        <div class="flex-1 flex flex-col">
            @if(!isset($hideNavbar) || !$hideNavbar)
                @include('components.navbar')
            @endif

            <div class="p-6 flex-grow">
                @yield('content')
            </div>

            @if(!isset($hideFooter) || !$hideFooter)
                @include('components.footer')
            @endif
        </div>
    </div>
</body>
</html>
