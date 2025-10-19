<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
class editerFraisController extends Controller
{
    function editerEtatFrais(){
        if(session('gestionnaire') != null){
            return('test');
        }
    }
}