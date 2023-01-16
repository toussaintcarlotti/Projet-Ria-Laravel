@extends('layout.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Profil</h4>
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
                    <form class="forms-sample row" action="{{ route('profiles.update', $profile->user) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom"
                                   value="{{ old('nom', $profile->user->nom) }}" placeholder="nom" name="nom">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom"
                                   value="{{ old('prenom', $profile->user->prenom) }}" placeholder="prenom" name="prenom">
                        </div>

                        @if($profile->user->status === 'etudiant')
                            <div class="mb-3">
                                <label for="diplome_etudiant" class="form-label">Diplome étudiant</label>
                                <input value="{{ old('diplome_etudiant', $profile->diplome_etudiant) }}" type="text" class="form-control"
                                       id="diplome_etudiant" placeholder="Diplome" name="diplome_etudiant">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="filiere_id" class="form-label">Filiere</label>
                                <select class="form-select" id="filiere_id" name="filiere_id">
                                    @foreach($filieres as $filiere)
                                        <option @selected(old('filiere_id', $profile->filiere_id) == $filiere->id) value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                        @elseif($profile->user->status === 'enseignant')
                            <div class="mb-3">
                                <label for="responsabilite_enseignant" class="form-label">Responsabilité enseignant</label>
                                <input value="{{ old('responsabilite_enseignant', $profile->responsabilite_enseignant) }}" type="text" class="form-control"
                                       id="responsabilite_enseignant" placeholder="Responsabilité" name="responsabilite_enseignant">
                            </div>
                        @endif

                        <div class="mb-3 col-md-6">
                            <label for="mail_univ" class="form-label">Email université</label>
                            <input value="{{ old('mail_univ', $profile->user->mail_univ) }}" type="email" class="form-control" id="mail_univ"
                                   placeholder="Email" name="mail_univ">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="tel" class="form-label">Téléphone</label>
                            <input value="{{ old('tel', $profile->user->tel) }}" type="text" class="form-control" id="tel"
                                   placeholder="Téléphone" name="tel">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ old('email', $profile->user->email) }}" type="email" class="form-control"
                                   id="email"
                                   placeholder="Email" name="email">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input value="{{ old('password') }}" type="password" class="form-control" id="password"
                                   placeholder="Password" name="password">
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

