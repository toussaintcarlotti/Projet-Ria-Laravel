@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Modifier un cours</h4>
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
                    <form class="forms-sample row" action="{{ route('teachers.courses.update', [$enseignant, $cours]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 mb-3">
                            <label for="horaire_debut" class="form-label">Horaire debut</label>
                            <div class="input-group date timepicker" id="datetimepickerExample" data-target-input="nearest">
                                <input value="{{ old('horaire_debut', $cours->horaire_debut) }}" id="horaire_debut" name="horaire_debut" placeholder="Horaire" type="text" class="form-control datetimepicker-input" data-target="#datetimepickerExample">
                                <span class="input-group-text" data-target="#datetimepickerExample" data-toggle="datetimepicker"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="horaire_fin" class="form-label">Horaire fin</label>
                            <div class="input-group date timepicker" id="datetimepicker" data-target-input="nearest">
                                <input value="{{ old('horaire_fin', $cours->horaire_fin) }}" id="horaire_fin" name="horaire_fin" placeholder="Horaire" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker">
                                <span class="input-group-text" data-target="#datetimepicker" data-toggle="datetimepicker"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="matiere_id" class="form-label">Matière</label>
                            <select class="form-select" id="matiere_id" name="matiere_id">
                                @foreach($matieres as $matiere)
                                    <option @selected(old('matiere_id', $cours->matiere_id) == $matiere->id) value="{{ $matiere->id }}">{{ $matiere->libelle_matiere }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="type_cours" class="form-label">Type de cours</label>
                            <select class="form-select" id="classe" name="type_cours">
                                <option @selected(old('type_cours', $cours->type_cours) == 'TD') value="TD">TD</option>
                                <option @selected(old('type_cours', $cours->type_cours) == 'TP') value="TP">TP</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    @push('plugin-scripts')
        <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
    @endpush

    @push('custom-scripts')
        <script src="{{ asset('assets/js/timepicker.js') }}"></script>
    @endpush
@endsection


