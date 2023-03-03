@extends('layout.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Étudiants</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            @if (auth()->user()->isAdmin())
                <a href="{{ route('students.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Ajouter un étudiant
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
                                <th>Diplôme</th>
                                <th>Filière</th>
                                @if (auth()->user()->isAdmin())
                                    <th class="col-1"></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($etudiants as $etudiant)
                                <tr>
                                    <td>{{ $etudiant->user->nom }}</td>
                                    <td>{{ $etudiant->user->prenom }}</td>
                                    <td>{{ $etudiant->user->email }}</td>
                                    <td>{{ $etudiant->diplome_etudiant }}</td>
                                    <td>{{ $etudiant->filiere?->nom }}</td>
                                    @if (auth()->user()->isAdmin())
                                        <td>
                                            <a href="{{ route('students.edit', $etudiant->id) }}"
                                               class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                                                <i class="btn-icon-prepend" data-feather="edit"></i>
                                                Modifier
                                            </a>
                                            <form action="{{ route('students.destroy', $etudiant->id) }}" method="post"
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
                        {{ $etudiants->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

