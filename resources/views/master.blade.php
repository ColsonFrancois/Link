<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Master</title>
</head>
<body>
<header><h1>@yield('title','Mon site')</h1></header>
@if(Session::has('ok'))
    <h2>{{ Session::get('ok') }}</h2>
@endif
<nav>
    <ul>
        <li><a href="{{ route('listLink') }}">List</a></li>
        <li><a href="{{ route('addLink') }}">Add</a></li>
        @if(Auth::check())
            <li><a href="">Bonjour, {{ Auth::user()->name }}</a></li>
            <li><a href="/auth/logout">Déconnecter</a></li>
        @else
            <li><a href="/auth/register">Créer un compte</a></li>
            <li><a href="/auth/login">Connecter</a></li>
        @endif
    </ul>
</nav>
@yield('contenu')
</body>
</html>