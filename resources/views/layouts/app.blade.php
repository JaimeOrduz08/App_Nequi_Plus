<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')- NequiPlus </title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    <!-- Fontawesome Link -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
 
  </head>
  <body>

    <nav class="flex py-5 bg-indigo-500 text-white">

    <div class="w-2/1 px-12 mr-auto">
      <p class="text-2xl font-bold">NEQUI PLUS</p>
    </div>

    <ul class="w-2/1 px-16 ml-auto flex justify-end pt-1">
      <li>
      @guest
        <a href="{{ route('login.index') }}" class="font-semibold hover:bg-indigo-700 py-3 px-4">Iniciar sesión</a>
        <a href="{{ route('register.index') }}" class="font-semibold hover:bg-indigo-700 py-3 px-4">Registrarse</a>
      @endguest

          @if(Auth::check())
      <a href="{{route('login.home')}}">Cerrar sesión</a>
      @endif

      </li>
    </ul>

    </nav>

    @yield('content')
  
  </body>
</html>