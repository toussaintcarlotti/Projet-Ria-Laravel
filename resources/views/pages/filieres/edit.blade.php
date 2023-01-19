@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Modifier la filière</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div>

            </div>
        </div>
    </div>
    <form action="{{ route('filieres.update', $filiere) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom"
                                       value="{{ old('nom', $filiere->nom) }}" placeholder="nom" name="nom">
                            </div>

                            {{-- niveau --}}
                            <div class="col-md-4 mb-3">
                                <label for="niveau" class="form-label">Niveau</label>
                                <select class="form-select" id="niveau" name="niveau">
                                    <option @selected(old('niveau', $filiere->niveau) == 'Licence') value="Licence">Licence</option>
                                    <option @selected(old('niveau', $filiere->niveau) == 'Master') value="Master">Master</option>
                                    <option @selected(old('niveau', $filiere->niveau) == 'Doctorat') value="Doctorat">Doctorat</option>
                                </select>
                            </div>

                            {{-- responsable --}}
                            <div class="col-md-4 mb-3">
                                <label for="responsable_id" class="form-label">Responsable</label>
                                <select class="form-select" id="responsable_id" name="responsable_id">
                                    <option value=""></option>
                                    @foreach($enseignants as $enseignant)
                                        <option @selected(old('responsable_id', $filiere->responsable_id) == $enseignant->id) value="{{ $enseignant->id }}">{{ $enseignant->user->nom }} {{ $enseignant->user->prenom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- description --}}
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" rows="3"
                                          name="description">{{ old('description', $filiere->description) }}</textarea>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="date_debut" class="form-label">Date debut</label>
                                <div class="input-group date datepicker">
                                    <input value="{{ old('date_debut', $filiere->date_debut) }}" id="date_debut" name="date_debut" type="text" class="form-control">
                                    <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="date_fin" class="form-label">Date fin</label>
                                <div class="input-group date datepicker">
                                    <input  value="{{ old('date_fin', $filiere->date_fin) }}" id="date_fin" name="date_fin" type="text" class="form-control">
                                    <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->

        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card ">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <h4 class="text-center">Ajouter ou supprimer des ue à la filière</h4>
                        <livewire:ue-filiere-list :filiere="$filiere" :ues="$ues" />
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Enregistrer</button>
        </div>
    </form>

@endsection


@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush
