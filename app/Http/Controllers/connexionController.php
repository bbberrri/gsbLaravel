<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;

class connexionController extends Controller
{
    function connecter(){
        
        return view('connexion')->with('erreurs',null);
    }
    
    function valider(Request $request){
        $login = $request['login'];
        $mdp = $request['mdp'];
        $visiteur = PdoGsb::getInfosVisiteur($login, $mdp);

            if(!is_array($visiteur)){
                $gestionnaire = PdoGsb::getInfosGestionnaire($login, $mdp);
                if (!is_array($gestionnaire)){
                    $erreurs[] = "Login ou mot de passe incorrect(s)";
                    return view('connexion')->with('erreurs', $erreurs);
                }
                // Connexion gestionnaire si le gestionnaire existe dans la base
                else{
                    return view('editfrais');
                }
            }
            // Connexion visiteur si le visiteur existe dans la base
            else{
                session(['visiteur' => $visiteur]);
                return view('sommaire')->with('visiteur',session('visiteur'));
            }
        }

        function deconnecter(){
            session(['visiteur' => null]);
            return redirect()->route('chemin_connexion');    
    }
}
