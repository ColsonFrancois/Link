<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Links;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('iplogger');
        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    //Action lister les liens
    public function listLink(){

        $links=Links::all();
        //var_dump($links);die;
        return view('link/listLink')->with('links',$links);
    }

    //Action ajouter des liens
    public function addLink(){
        return view('link/addLink');
    }

    public function showLink($id){
        $link=Links::find($id);
        return view('link/showLink')->with('link',$link);
    }

    public function deleteLink($id){
        $link=Links::find($id);
        $link->delete();
        return redirect()->route('listLink')->with('ok','Elément supprimé !');
    }

    //Action ajouter des liens
    public function validLink(Request $req){
        $parametres=$req->except(['_token']);

        //Links::create($parametres);

        $links = new Links();

        $links->nom=$parametres['nom'];
        $links->link=$parametres['lien'];
        $links->description=$parametres['description'];

        $links->save();

        return redirect()->route('listLink')->with('ok','ok tout c\'est bien passe');
    }
    // via le lien "Update" -> GET / via le formulaire -> POST
    public function updateLink(Request $req,$id){
        $link=Links::find($id);

        if($req->isMethod('post')) {
            $parametres=$req->except(['_token']);
            $link->nom=$parametres['nom'];
            $link->link=$parametres['lien'];
            $link->description=$parametres['description'];
            $link->save();
            return redirect()->route('listLink')->with('ok','Lien modifié');
        }

        return view('link/addLink')->with('link',$link);

    }

}