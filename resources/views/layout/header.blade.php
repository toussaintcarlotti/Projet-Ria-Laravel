<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <form class="search-form">
      <div class="input-group">
        <div class="input-group-text">
          <i data-feather="search"></i>
        </div>
        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
      </div>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle " href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i data-feather="user"></i>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              {{-- <img class="wd-80 ht-80 rounded-circle" src="{{ url('https://via.placeholder.com/80x80') }}" alt=""> --}}
            </div>
            <div class="text-center">
              <p class="tx-16 fw-bolder">{{ auth()->user()->nom .' '. auth()->user()->prenom }}</p>
              <p class="tx-12 text-muted">{{ auth()->user()->email }}</p>
            </div>
          </div>
          <ul class="list-unstyled p-1">
            <li class="dropdown-item py-2">
              <a href="{{ route('profiles.edit', auth()->user()) }}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="user"></i>
                <span>Profile</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="text-body ms-0">
                        <button type="submit" class="bg-transparent border-0 p-0">
                            <i class="me-2 icon-md" data-feather="log-out"></i>
                            <span>{{ __('Logout') }}</span>
                        </button>
                    </a>
                </form>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
