<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Pariwisata</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('destinations.*') ? 'active' : '' }}"
                       href="{{ route('destinations.index') }}">
                        Destinasi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                       href="{{ route('users.index') }}">
                        User
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('attractions.*') ? 'active' : '' }}"
                       href="{{ route('attractions.index') }}">
                        Attraction
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="#">
                        Dashboard
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>