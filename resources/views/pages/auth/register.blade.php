@extends('layout.guest')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 pe-md-0">
                            <div class="auth-side-wrapper"
                                 style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">

                            </div>
                        </div>
                        <div class="col-md-8 ps-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <a href="#" class="noble-ui-logo d-block mb-2">Projet<span>RIA</span></a>
                                <h5 class="text-muted fw-normal mb-4">Créer un compte.</h5>
                                <form class="forms-sample row" action="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="col-md-6 mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom"
                                               value="{{ old('nom') }}" placeholder="nom" name="nom" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom"
                                               value="{{ old('prenom') }}" placeholder="prenom" name="prenom" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input value="{{ old('email') }}" type="email" class="form-control" id="email" placeholder="Email" name="email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="profile" class="form-label">Profil</label>
                                        <select class="form-select" id="profile" name="profile">
                                            <option @selected(old('profile') == null) disabled></option>
                                            <option @selected(old('profile') == 'etudiant') value="etudiant">Étudiant</option>
                                            <option @selected(old('profile') == 'enseignant') value="enseignant">Enseignant</option>
                                        </select>

                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" id="password"
                                               placeholder="Password" name="password">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password_confirmation" class="form-label">Confirmation</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                               placeholder="Password" name="password_confirmation">
                                    </div>
                                    <div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" id="authCheck">
                                            <label class="form-check-label" for="authCheck">
                                                Se souvenir de moi
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Sign up</button>
                                    </div>
                                    <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Vous avez déjà un compte ? Connexion</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
