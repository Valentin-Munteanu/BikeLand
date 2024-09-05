<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", "My App")</title>
    <link rel="stylesheet" href="{{asset("Css/styles.css")}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="icon" href="{{asset("Images/Logo.png")}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <ul class="navbar">
        <div class="logo">
            <a href="{{route("principal")}}"><img src="{{asset("Images/Logo.png")}}" alt=""></a>
        </div>
        <nav class="nav-menu">
            <header>
                <a href="{{route("biciclete")}}">Biciclete</a>
                <a href="{{route("accesorii")}}">Accesorii</a>
                <a href="{{route("trotinete")}}">Micro vehicule</a>
                @if (auth("web")->check() && !auth("admins")->check())
                <a href="{{route("user-dashboard")}}">Contul meu</a>
                <a href="{{route("cart.view")}}" class="nav-icon"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="{{route("favorites.view")}}"><i class="fa-solid fa-heart"></i></a>
                <form action="{{route("search")}}" method="GET" class="search-form">
                    <input type="text" name="query" placeholder="Căutare..." required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                @elseif (auth("admins")->check())
                <a href="{{route("create-bike")}}">Crearea Biciclete</a>
                <a href="{{route("edit-bike")}}">Editarea Biciclete</a>
                <a href="{{route("create-trotinete")}}">Crearea Trotinetelor</a>
                <a href="{{route("edit-trotinete")}}">Editarea Trotinetelor</a>
                <a href="{{route("create-accesorii")}}">Crearea Accesorii</a>
                <a href="{{route("edit-accesorii")}}">Editare Accesorii</a>
                <a href="{{route("admin-dashboard")}}">Contul Admin</a>
                @else
                <a href="{{route("register")}}">Autentificare</a>
                <a href="{{route("admin-register")}}">Admin</a>
            <input type="text"><i class="fa-solid fa-magnifying-glass"></i>
                <a href="{{route("favorites.view")}}"><i class="fa-solid fa-heart"></i></a>
                <a href="{{route("cart.view")}}"><i class="fa-solid fa-cart-shopping"></i></a>
                @endif
            </header>
        </nav>
    </ul>
    <main>
    @yield('content')
    </main>
</body>
</html>
