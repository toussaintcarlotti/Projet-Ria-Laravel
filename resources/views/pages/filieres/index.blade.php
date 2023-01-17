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
                                <th>Nom</th>
                                @if (auth()->user()->role->nom === 'admin')
                                    <th></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($filieres as $filiere)
                                <tr>
                                    <td>{{ $filiere->nom }}</td>
                                    <td>{{ $filiere->nom }}</td>

                                    @if (auth()->user()->role->nom === 'admin')
                                        <td>

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

