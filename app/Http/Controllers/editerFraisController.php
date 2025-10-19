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
            return view('editEtatFraisAnnee')->with('gestionnaire', $gestionnaire);
        }
    }
}