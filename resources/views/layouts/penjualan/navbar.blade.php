<nav class="app-header navbar navbar-expand bg-white shadow-sm border-bottom">

    <div class="container-fluid">

        <!-- LEFT -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-dark" data-lte-toggle="sidebar" href="#">
                    <i class="bi bi-list fs-5"></i>
                </a>
            </li>

            <li class="nav-item d-none d-md-block">
                <a href="{{ route('welcome') }}" class="nav-link text-dark fw-semibold">
                    🏠 Home
                </a>
            </li>
        </ul>

        <!-- RIGHT -->
        <ul class="navbar-nav ms-auto align-items-center">

            <!-- USER -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">

                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                        class="rounded-circle border me-2" width="35" height="35" alt="User">

                    <span class="d-none d-md-inline text-dark fw-semibold">
                        {{ auth()->user()->name }}
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                    <!-- HEADER -->
                    <li class="text-center p-3 border-bottom">
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                            class="rounded-circle mb-2 border" width="70">

                        <p class="mb-0 fw-semibold">
                            {{ auth()->user()->name }}
                        </p>
                        <small class="text-muted">
                            {{ auth()->user()->role->name }}
                        </small>
                    </li>

                    <!-- MENU -->
                    <li class="p-2 d-flex justify-content-between">

                        <a href="#" class="btn btn-sm btn-outline-secondary">
                            Profile
                        </a>

                        <!-- LOGOUT -->
                        <a href="#" class="btn btn-sm btn-outline-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>

                </ul>
            </li>

        </ul>

    </div>

</nav>