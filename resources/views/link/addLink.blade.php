@extends('../master')

@section('title')
    <h1>Mon site - {{ isset($link->id)?'Mettre à jour':'Créer '}} un lien</h1>
@endsection

@section('contenu')
    <form method="post" action="{{ isset($link->id)? route('updateLink',['id'=>$link->id]) :route('validLink') }}">
        <p>
            <label for="nom" >Nom :</label>
            <input type="text" name="nom" id="nom" placeholder="Tapez le nom" value="{{ $link->nom or '' }}" />

            <br />
            <label for="lien" >Lien</label>
            <input type="url" name="lien" id="lien" placeholder="Tapez le lien" value="{{ $link->link or '' }}" />

            <br />
            <label for="description">Description</label><br />
            <textarea name="description" id="description"  placeholder="Tapez la description">{{ $link->description or '' }}</textarea>

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <input type="submit" value="{{ isset($link->id)?'Update':'Add ' }}" />
        </p>
    </form>
@endsection