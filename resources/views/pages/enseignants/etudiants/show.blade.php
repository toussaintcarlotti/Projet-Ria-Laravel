@extends('layout.master')


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">
                Etudiant :
                <span class="fw-bold text-primary">
                    {{ $etudiant->user->nom . " " . $etudiant->user->prenom}}
                </span>
            </h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">

        </div>
    </div>
    @foreach($cours as $cour)
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <h6 class="card-title mb-0">{{ $cour->matiere->libelle_matiere }}</h6>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Examen</th>
                                    <th>Note</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cour->notesEtudiant($etudiant) as $note)
                                    <tr>
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

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

