<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')- {{config('app.name')}}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
   

</head>
<body>
<section class ="container px-4 mx-auto">
    <head> 
        @yield('header')
    </head>

    <div class="content">
        <x-messages/>
        @yield('content')
    </div>

    <footer>
      
    </footer>
</section>
</body>
</html>