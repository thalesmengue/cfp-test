<nav class="navbar navbar-expand-lg navbar-light bg-white shadow mb-3">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bold text-gray-900" href="{{ route('users.index') }}">CFP Energy</a>
        <div class="px-4"></div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-gray-900 border-bottom border-2 border-primary" href="{{ route('users.index') }}">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button class="nav-link text-gray-900 border-bottom border-2 border-primary" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
