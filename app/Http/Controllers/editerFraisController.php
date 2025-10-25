<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
class editerFraisController extends Controller
{
    function editerEtatFraisAnnee(){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire');
            $lesAnnees = PdoGsb::getLesAnneesDisponibles();
            return view('editEtatFraisAnnee')
                    ->with('gestionnaire', $gestionnaire)
                    ->with('lesAnnees', $lesAnnees);
        }
    }

    function editerEtatFraisType(){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire');
            return view('editEtatFraisType')->with('gestionnaire', $gestionnaire);
        }
    }

    function editerEtatFraisVisiteur(){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire');
            return view('editEtatFraisVisiteur')->with('gestionnaire', $gestionnaire);
        }
    }
}