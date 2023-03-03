@extends('layout.master')


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Filières</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            @if (auth()->user()->role->nom === 'admin')
                <a href="{{ route('filieres.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Ajouter une filière
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
                                <th>Description</th>
                                <th>Niveau</th>
                                @if (auth()->user()->role->nom === 'admin')
                                    <th class="col-1"></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($filieres as $filiere)
                                <tr>
                                    <td>{{ $filiere->nom }}</td>
                                    <td>{{ Str::limit($filiere->description, 40) }}</td>
                                    <td>{{ $filiere->niveau }}</td>

                                    @if (auth()->user()->role->nom === 'admin' || auth()->user()->role->nom === 'directeur_etude')
                                        <td>
                                            <a href="{{ route('filieres.show', $filiere) }}"
                                               class="btn btn-info btn-icon-text mb-2 mb-md-0">
                                                <i class="btn-icon-prepend" data-feather="eye"></i>
                                                Voir
                                            </a>
                                            <a href="{{ route('filieres.edit', $filiere) }}"
                                               class="btn btn-primary btn-icon-text">
                                                <i class="btn-icon-prepend" data-feather="edit"></i>
                                                Modifier
                                            </a>
                                            <form action="{{ route('filieres.destroy', $filiere) }}" method="post"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon-text">
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
                        {{ $filieres->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

@endsection

