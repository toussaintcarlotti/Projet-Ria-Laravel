@extends('layout.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Modifier une filière</h4>
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
                    <form class="forms-sample row" action="" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom"
                                   value="{{ old('nom', $filieres->nom) }}" placeholder="nom" name="nom">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- row -->

@endsection


