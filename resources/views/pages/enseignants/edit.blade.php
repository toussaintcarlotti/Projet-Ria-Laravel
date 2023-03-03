

@extends('layout.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Modifier un enseignant</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div>
                <a href="{{ route('teachers.edt', $enseignant) }}" class="btn btn-bitbucket">Emploi du temps</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <form class="forms-sample row" action="{{ route('teachers.update', $enseignant) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom"
                                   value="{{ old('nom', $enseignant->user->nom) }}" placeholder="nom" name="nom">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom"
                                   value="{{ old('prenom', $enseignant->user->prenom) }}" placeholder="prenom" name="prenom">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="responsabilite_enseignant" class="form-label">Responsabilité enseignant</label>
                            <input value="{{ old('responsabilite_enseignant', $enseignant->responsabilite_enseignant) }}" type="text" class="form-control"
                                   id="responsabilite_enseignant" placeholder="Responsabilité" name="responsabilite_enseignant">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="role_id" class="form-label">Role</label>
                            <select class="form-select" id="role_id" name="role_id">
                                <option @selected(old('role_id', $enseignant->user->role_id) == 3) value="3">Directeur département</option>
                                <option @selected(old('role_id', $enseignant->user->role_id) == 2) value="2">Directeur d'étude</option>
                            </select>
                        </div>


                        <div class="mb-3 col-md-6">
                            <label for="mail_univ" class="form-label">Email université</label>
                            <input value="{{ old('mail_univ', $enseignant->user->mail_univ) }}" type="email" class="form-control" id="mail_univ"
                                   placeholder="Email" name="mail_univ">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="tel" class="form-label">Téléphone</label>
                            <input value="{{ old('tel', $enseignant->user->tel) }}" type="text" class="form-control" id="tel"
                                   placeholder="Téléphone" name="tel">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ old('email', $enseignant->user->email) }}" type="email" class="form-control"
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

