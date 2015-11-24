@extends('../master')

@section('title')
<h1>Mon site - Liste des liens</h1>
@endsection

@section('contenu')

    @foreach($links as $link)
        <p><a href="{{ $link->link }}">{{ $link->nom }}</a> - {{ $link->description }} - <a href="{{ route('showLink',
        ['id'=>$link->id]) }}">Détail</a> -  <a href="{{ route('updateLink',['id'=>$link->id]) }}">Update</a>-
            <a href="{{ route('deleteLink',['id'=>$link->id]) }}">Suppression</a></p>
    @endforeach


@endsection