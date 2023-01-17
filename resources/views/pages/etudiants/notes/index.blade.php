@extends('layout.master')


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Mes Notes</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">

        </div>
    </div>


    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Filière</th>
                                <th>Ue</th>
                                <th>Matière</th>
                                <th>Enseignant</th>
                                <th>Examen</th>
                                <th>Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notes as $note)
                                <tr>
                                    <td>{{ $note->cours->ue->filiere->nom }}</td>
                                    <td>{{ $note->cours->ue->libelle }}</td>
                                    <td>{{ $note->cours->matiere->libelle_matiere }}</td>
                                    <td>{{ $note->cours->enseignant->user->nom . " " . $note->cours->enseignant->user->prenom}}</td>
                                    <td>{{ $note->nom_examen }}</td>
                                    <td>
                                        <span class="text-primary fw-bold">{{ $note->note }} </span>
                                        <span class="text-muted">/20</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $notes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

@endsection

