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
            {{ var_dump($lesMois) }}
            <div class="infos">
                @foreach(array_keys($lesVisiteurs) as $uneAnnee)
                    <div>
                        <h3>{{ $uneAnnee }}</h3>
                        @foreach(array_keys($lesVisiteurs[$uneAnnee]) as $unVisiteur)
                            <div>{{ $unVisiteur }}</div>
                            <div></div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    @endsection