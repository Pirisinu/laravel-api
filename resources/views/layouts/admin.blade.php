<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Side</title>
    <!-- Usando Vite -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css' integrity='sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==' crossorigin='anonymous'/>
    @vite(['resources/js/app.js'])
</head>
<body >
    @include('admin.partials.header')

    <div class="main-wrapper overflow-hidden d-flex">
        @include('admin.partials.aside')
        <div class="overflow-x-auto w-100">
            @yield('content')
        </div>
    </div>
</body>
</html>
