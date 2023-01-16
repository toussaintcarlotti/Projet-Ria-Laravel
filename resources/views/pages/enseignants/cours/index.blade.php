@extends('layout.master')


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Étudiants</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            @if (isset($enseignant))
                <a href="{{ route('teachers.courses.create', $enseignant) }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Ajouter un cours
                </a>
            @endif

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
                                <th>Matière</th>
                                <th>Horaire</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cours as $cour)
                                <tr>
                                    <td>{{ $cour->matiere->libelle_matiere }}</td>
                                    <td>{{ $cour->horaire_debut . "-" . $cour->horaire_fin }}</td>
                                    <td>
                                        <a href="{{ route('teachers.courses.edit', [$enseignant, $cour]) }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                                            <i class="btn-icon-prepend" data-feather="edit"></i>
                                            Modifier
                                        </a>
                                        <form action="{{ route('teachers.courses.destroy', [$enseignant, $cour]) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon-text mb-2 mb-md-0">
                                                <i class="btn-icon-prepend" data-feather="trash"></i>
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $cours->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

@endsection

