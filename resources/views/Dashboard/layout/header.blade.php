<style>
    .dropdown-menu a.dropdown-item {
        transition: all 0.2s ease;
        color: #000 !important;
        display: flex;
        align-items: center;
    }

    .dropdown-menu a.dropdown-item i {
        margin-right: 6px;
        color: #000 !important;
        transition: color 0.2s ease;
    }

    .dropdown-menu a.dropdown-item:hover {
        background-color: #007bff !important;
        color: #fff !important;
        border-radius: 4px;
    }

    .dropdown-menu a.dropdown-item:hover i {
        color: #fff !important;
    }

    .dropdown-menu form a {
        display: flex;
        align-items: center;
        padding: 10px 16px;
        color: #000 !important;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .dropdown-menu form a i {
        margin-right: 6px;
        color: #000 !important;
        transition: color 0.2s ease;
    }

    .dropdown-menu form a:hover {
        background-color: #007bff !important;
        color: #fff !important;
        border-radius: 4px;
    }

    .dropdown-menu form a:hover i {
        color: #fff !important;
    }

    .menu-icon {
        font-size: 1.6rem;
        padding: 50px 50px; /* tambahkan ruang agar tidak mepet */
        cursor: pointer;
    }

.btn-outline-interaktif {
    background-color: white;
    color: #007bff;
    border: 2px solid #007bff;
    border-radius: 20px;
    padding: 6px 15px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-outline-interaktif i {
    color: #007bff;
    transition: transform 0.3s ease;
}

.btn-outline-interaktif:hover {
    background-color: #007bff;
    color: white;
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    text-decoration: none;
}

.btn-outline-interaktif:hover i {
    color: white;
    transform: translateX(3px); /* sedikit animasi ke kanan */
}

.btn-solid-interaktif {
    background-color: #007bff;
    color: white;
    border: 2px solid #007bff;
    border-radius: 20px;
    padding: 6px 15px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-solid-interaktif i {
    color: white;
    transition: transform 0.3s ease;
}

.btn-solid-interaktif:hover {
    background-color: white;
    color: #007bff;
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    text-decoration: none;
}

.btn-solid-interaktif:hover i {
    color: #007bff;
    transform: translateX(3px); /* animasi geser */
}

</style>

<div class="header d-flex justify-content-between align-items-center">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
    </div>

    @auth
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('assets/vendors/images/profile.png') }}" alt="" />
                    </span>
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person-circle"></i> Profil Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="bi bi-box-arrow-right"></i> Keluar
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth

    @guest
    <div class="header-right d-flex align-items-center pr-4" style="gap: 0.5rem;">
        <a href="{{ route('login') }}"
   class="btn btn-solid-interaktif">
    <i class="bi bi-person-circle" style="font-size: 1.2rem;"></i>
    <span>Masuk</span>
</a>

        <a href="{{ route('register') }}"
   class="btn btn-outline-interaktif">
    <span>Daftar</span>
    <i class="bi bi-arrow-right-circle-fill" style="font-size: 1.2rem;"></i>
</a>
    </div>
    @endguest
</div>
