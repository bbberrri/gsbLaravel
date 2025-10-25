@extends('sommaireGestion')
    @section('contenu1')
        <div id="contenu">
            <div class="row">
                <div class="column-clicked">
                    Par année
                </div>
                <div class="column">
                    <a href="{{ route('chemin_editFraisType') }}">Par type</a>
                </div>
                <div class="column">
                    <a href="{{ route('chemin_editFraisVisiteur') }}">Par visiteur</a>
                </div>
            </div>
            <div class="infos">
                {{ var_dump($lesAnnees) }}
            </div>
        </div>
    @endsection