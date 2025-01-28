<!-- Header Start -->

<style>
    @media (max-width: 768px) {
        h1 {
            font-size: 1.8rem;
        }

        .carousel-caption {
            padding: 1rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            font-size: 0.9rem;
        }
    }
</style>
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="/" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase">Amira Hotel</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 justify-content-center">
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('guest.home') }}" class="nav-item nav-link {{ Request::is('home') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('guest.about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
                        <a href="{{ route('guest.service') }}" class="nav-item nav-link {{ Request::is('services') ? 'active' : '' }}">Services</a>
                        
                        <a href="{{ route('login') }}" class="nav-item nav-link {{ Request::is('login') ? 'active' : '' }}">Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->
