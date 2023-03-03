@extends('layout.master')


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Filière <span class="text-info">{{ $filiere->nom }}</span></h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h4>Responsable: </h4>
                            <p>{{ $filiere->responsable->user->nom }} {{ $filiere->responsable->user->prenom }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4>Nombre d'étudiants: </h4>
                            <p>{{ $filiere->etudiants->count() }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4>Niveau: </h4>
                            <p>{{ $filiere->niveau }}</p>
                        </div>

                        <div>
                            <h4>Description</h4>
                            <p>{{ $filiere->description }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h4 class="text-center">Ue de la filière</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                @if (auth()->user()->role->nom === 'admin')
                                    <th class="col-1"></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($filiere->ues as $ue)
                                <tr>
                                    <td>{{ $ue->libelle }}</td>
                                    <td>{{ Str::limit($ue->description, 40) }}</td>
                                    @if (auth()->user()->role->nom === 'admin')
                                        <td>
                                            <a href="{{ route('ues.show', $ue) }}"
                                               class="btn btn-info btn-icon-text mb-2 mb-md-0">
                                                <i class="btn-icon-prepend" data-feather="eye"></i>
                                                Voir
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

