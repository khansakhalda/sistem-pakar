<style>
.dropdown-menu a.dropdown-item {
    transition: all 0.2s ease;
    color: #000 !important; /* ubah teks jadi hitam */
    display: flex;
    align-items: center;
}

.dropdown-menu a.dropdown-item i {
    margin-right: 6px;
    color: #000 !important; /* ubah ikon jadi hitam */
    transition: color 0.2s ease;
}

.dropdown-menu a.dropdown-item:hover {
    background-color: #ff914d !important;
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
    color: #000 !important; /* teks hitam */
    text-decoration: none;
    transition: all 0.2s ease;
}

.dropdown-menu form a i {
    margin-right: 6px;
    color: #000 !important; /* ikon hitam */
    transition: color 0.2s ease;
}

.dropdown-menu form a:hover {
    background-color: #ff914d !important;
    color: #fff !important;
    border-radius: 4px;
}

.dropdown-menu form a:hover i {
    color: #fff !important;
}
</style>

<div class="header">
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
           class="btn d-flex align-items-center"
           style="background-color: #ff914d; border: none; border-radius: 20px; padding: 6px 15px; font-weight: 500; color: white; gap: 8px;">
            <i class="bi bi-person-circle" style="font-size: 1.2rem;"></i>
            <span>Masuk</span>
        </a>
        <a href="{{ route('register') }}" 
           class="btn d-flex align-items-center"
           style="background-color: #ff914d; border: none; border-radius: 20px; padding: 6px 15px; font-weight: 500; color: white; gap: 8px;">
            <span>Daftar</span>
            <i class="bi bi-arrow-right-circle-fill" style="font-size: 1.2rem;"></i>
        </a>
    </div>
    @endguest
</div>
