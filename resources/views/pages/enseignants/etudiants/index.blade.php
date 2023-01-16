@extends('layout.master')


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Vos étudiants</h4>
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
                                <th>Nom</th>
                                <th>Filiere</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($etudiants as $etudiant)
                                <tr>
                                    <td>{{ $etudiant->user->nom }}</td>
                                    <td>{{ $etudiant->filiere->nom }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $etudiants->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

@endsection

