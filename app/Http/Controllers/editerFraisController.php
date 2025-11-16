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

            $mois_string = array("01" => "Janvier", "02" => "Février", "03" => "Mars", "04" => "Avril", "05" => "Mai", "06" => "Juin",
            "07" => "Juillet", "08" => "Août", "09" => "Septembre", "10" => "Octobre", "11" => "Novembre", "12" => "Décembre");
            $lesMois = array();
            //Boucles permettant d'associer pour un visiteur les mois pour lesquels des frais ont été enregistré
            foreach(array_keys($lesVisiteurs) as $uneAnnee)
            {
                foreach(array_keys($lesVisiteurs[$uneAnnee]) as $unVisiteur)
                {
                    $id = $lesVisiteurs[$uneAnnee][$unVisiteur];
                    $lesMoisVisiteur = array();
                    $les_mois = PdoGsb::getLesMoisDisponibles($id);
                    //Boucle remplaçant les numéros des mois envoyés par getLesMoisDisponibles à leurs équivalents en string 
                    foreach($les_mois as $infosMois)
                    {
                        if($infosMois["numAnnee"] == $uneAnnee)
                        {
                            $numMois = $infosMois["numMois"];
                            array_push($lesMoisVisiteur, $mois_string[$numMois]);
                        }
                    }
                    $lesMois[$uneAnnee][$unVisiteur] = array("id" => $id, "mois" => $lesMoisVisiteur);
                    //Les variables $lesVisiteurs et $lesMois sont redondantes 
                    //$lesVisiteurs est une version tronquée, sans le tableau des mois associés aux visiteurs, de $lesMois
                    //$lesVisiteurs sert de base à la construction de $lesMois
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