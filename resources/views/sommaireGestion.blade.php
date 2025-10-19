@extends('modeles/visiteur')
    @section('menu')
        <div id="menuGauche">
            <div id="infosUtil">

            </div>
            <div>
                <ul id="menuList">
                    <li>
                        <strong>Bonjour {{ $gestionnaire['nom'] . ' '  . $gestionnaire['prenom'] }}</strong>
                    </li>
                    <li>
                        <a href="{{ route('chemin_editEtatFrais') }}" title="Éditer les états des frais">Éditer les états des frais</a>
                    </li>
                    <li class="smenu">
                        <a href="{{ route('chemin_deconnexion') }}" title="Se déconnecter">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    @endsection