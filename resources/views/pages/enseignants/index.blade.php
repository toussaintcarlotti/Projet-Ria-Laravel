@extends('layout.master')


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Étudiants</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            @if (auth()->user()->role->nom === 'admin')
                <a href="{{ route('students.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Ajouter un enseignant
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
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Responsabilité</th>
                                <th>Responsable filière</th>
                                @if (auth()->user()->role->nom === 'admin')
                                    <th class="col-1"></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($enseignants as $enseignant)
                                <tr>
                                    <td>{{ $enseignant->user->nom }}</td>
                                    <td>{{ $enseignant->user->prenom }}</td>
                                    <td>{{ $enseignant->user->email }}</td>
                                    <td>{{ $enseignant->responsabilite_enseignant }}</td>
                                    <td>{{ $enseignant->filiereResponsable?->nom }}</td>
                                    @if (auth()->user()->role->nom === 'admin')
                                        <td>
                                            <a href="{{ route('teachers.edit', $enseignant->id) }}"
                                               class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                                                <i class="btn-icon-prepend" data-feather="edit"></i>
                                                Modifier
                                            </a>
                                            <form action="{{ route('teachers.destroy', $enseignant->id) }}" method="post"
                                                  class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-icon-text mb-2 mb-md-0">
                                                    <i class="btn-icon-prepend" data-feather="trash"></i>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $enseignants->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

@endsection

