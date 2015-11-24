@extends('../master')

@section('title')
    <h1>Mon site - Détail d'un lien</h1>
@endsection

@section('contenu')

        <p><a href="{{ $link->link }}">{{ $link->nom }}</a> - {{ $link->description }}</p>

@endsection