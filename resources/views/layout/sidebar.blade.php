<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('home') }}" class="sidebar-brand">
            Projet<span>RIA</span>
        </a>
        <div class="sidebar-toggler active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['dashboard-example']) }}">
                <a href="{{ route('dashboard.example') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard Example</span>
                </a>
            </li>
            @if(auth()->user()->role->nom === 'admin')
                <li class="nav-item nav-category">Administration</li>
                <li class="nav-item {{ active_class(['etudiants*']) }}">
                    <a href="#etudiant" class="nav-link" data-bs-toggle="collapse" role="button"
                       aria-expanded="{{ is_active_route(['etudiants']) }}" aria-controls="etudiants">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">√Čtudiants</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['etudiants*']) }}" id="etudiant">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('students.index') }}"
                                   class="nav-link {{ active_class(['etudiants']) }}">Tous les √©tudiants</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('students.create') }}"
                                   class="nav-link {{ active_class(['etudiants/cr√©er']) }}">Ajouter un √©tudiant</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ active_class(['enseignants*']) }}">
                    <a href="#enseignant" class="nav-link" data-bs-toggle="collapse" role="button"
                       aria-expanded="{{ is_active_route(['enseignants*']) }}" aria-controls="enseignants">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Enseignants</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['enseignants*']) }}" id="enseignant">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('teachers.index') }}"
                                   class="nav-link {{ active_class(['enseignants']) }}">Tous les enseignants</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('teachers.create') }}"
                                   class="nav-link {{ active_class(['enseignants/cr√©er']) }}">Ajouter un enseignant</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ active_class(['filieres*']) }}">
                    <a href="#filiere" class="nav-link" data-bs-toggle="collapse" role="button"
                       aria-expanded="{{ is_active_route(['filieres*']) }}" aria-controls="filieres">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Fili√®res</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['filieres*']) }}" id="filiere">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('filieres.index') }}"
                                   class="nav-link {{ active_class(['filieres']) }}">Toutes les filieres</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('filieres.create') }}"
                                   class="nav-link {{ active_class(['filieres/cr√©er']) }}">Ajouter une filieres</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            @if(auth()->user()->status === 'enseignant')
                <li class="nav-item nav-category">Gestion</li>
                <li class="nav-item {{ active_class(['etudiants*']) }}">
                    <a href="#etudiant" class="nav-link" data-bs-toggle="collapse" role="button"
                       aria-expanded="{{ is_active_route(['etudiants*', 'enseignants/*/etudiants*']) }}"
                       aria-controls="etudiants">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">√Čtudiants</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['etudiants*', 'enseignants/*/etudiants*']) }}" id="etudiant">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('students.index') }}"
                                   class="nav-link {{ active_class(['etudiants']) }}">Tous les √©tudiants</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('teachers.students', auth()->user()->profile) }}"
                                   class="nav-link {{ active_class(['enseignants/*/etudiants*']) }}">Mes √©tudiants</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ active_class(['filieres*']) }}">
                    <a href="#filiere" class="nav-link" data-bs-toggle="collapse" role="button"
                       aria-expanded="{{ is_active_route(['filieres*']) }}" aria-controls="filieres">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Fili√®res</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['filieres*']) }}" id="filiere">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('filieres.index') }}"
                                   class="nav-link {{ active_class(['filieres']) }}">Toutes les filieres</a>
                            </li>
                            @if(auth()->user()->role->nom === "directeur_etude")

                                <li class="nav-item">
                                    <a href="{{ route('filieres.create') }}"
                                       class="nav-link {{ active_class(['filieres/cr√©er']) }}">Ajouter une filieres</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ active_class(['*cours*']) }}">
                    <a href="#cours" class="nav-link" data-bs-toggle="collapse" role="button"
                       aria-expanded="{{ is_active_route(['*cours*']) }}" aria-controls="cours">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Cours</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['*cours*']) }}" id="cours">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('teachers.courses', auth()->user()->profile) }}"
                                   class="nav-link {{ active_class(['*cours']) }}">Mes cours</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('teachers.courses.create', auth()->user()->profile) }}"
                                   class="nav-link {{ active_class(['*cours/cr√©er']) }}">Cr√©er un cours</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-category">Mon espace</li>
                <li class="nav-item {{ active_class(['enseignants/*/emploi-du-temps']) }}">
                    <a href="{{ route('teachers.edt', auth()->user()->profile) }}" class="nav-link">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Emploi du temps</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->role->nom === 'etudiant')
                <li class="nav-item nav-category">Mon espace</li>
                <li class="nav-item {{ active_class(['etudiant/*/notes']) }}">
                    <a href="{{ route('students.notes', auth()->user()->profile) }}" class="nav-link">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Mes notes</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['filieres/*/emploi-du-temps']) }}">
                    <a href="{{ route('filieres.edt', auth()->user()->profile->filiere) }}" class="nav-link">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Emploi du temps</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</nav>
{{--
<nav class="settings-sidebar">
<div class="sidebar-body">
<a href="#" class="settings-sidebar-toggler">
<i data-feather="settings"></i>
</a>
<h6 class="text-muted mb-2">Sidebar:</h6>
<div>
<div class="form-check form-check-inline">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
               value="sidebar-light" checked>
        Light
    </label>
</div>
<div class="form-check form-check-inline">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
               value="sidebar-dark">
        Dark
    </label>
</div>
</div>
</div>
</nav>
--}}
