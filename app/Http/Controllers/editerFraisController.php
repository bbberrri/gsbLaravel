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
            $lesVisiteurs = PdoGsb::getLesVisiteursParAnnee();

            $moisA_N = array("01" => "Janvier", "02" => "Février", "03" => "Mars", "04" => "Avril", "05" => "Mai", "06" => "Juin",
            "07" => "Juillet", "08" => "Août", "09" => "Septembre", "10" => "Octobre", "11" => "Novembre", "12" => "Décembre");
            $lesMois = array();
            foreach(array_keys($lesVisiteurs) as $uneAnnee)
            {
                foreach(array_keys($lesVisiteurs[$uneAnnee]) as $unVisiteur)
                {
                    $id = $lesVisiteurs[$uneAnnee][$unVisiteur];
                    $les_mois = PdoGsb::getLesMoisDisponibles($id);
                    $lesMoisVisiteur = array();
                    foreach($les_mois as $infosMois)
                    {
                        if($infosMois["numAnnee"] == $uneAnnee)
                        {
                            $numMois = $infosMois["numMois"];
                            array_push($lesMoisVisiteur, $moisA_N[$numMois]);
                        }
                    }

                    $lesMois[$uneAnnee][$unVisiteur] = array("id" => $id, "mois" => $lesMoisVisiteur);
                }
            }

            return view('editEtatFraisAnnee')
                    ->with('gestionnaire', $gestionnaire)
                    ->with('lesVisiteurs', $lesVisiteurs)
                    ->with('lesMois', $lesMois);
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