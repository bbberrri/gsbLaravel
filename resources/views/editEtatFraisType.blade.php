@extends('sommaireGestion')
    @section('contenu1')
        <div id="contenu">
            <div class="row">
                <div class="column">
                    <a href="{{ route('chemin_editFraisAnnee') }}">Par année</a>
                </div>
                <div class="column-clicked">
                    Par type
                </div>
                <div class="column">
                    <a href="{{ route('chemin_editFraisVisiteur') }}">Par visiteur</a>
                </div>
            </div>
        </div>
    @endsection