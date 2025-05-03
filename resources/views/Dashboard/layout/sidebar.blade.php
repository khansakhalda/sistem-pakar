<?php
function selected($url)
{
    return last(request()->segments()) == $url ? 'active' : '';
}
?>

<style>
    /* Hover dan aktif: warna biru */
    .sidebar-menu li a:hover,
    .sidebar-menu li a.active,
    .submenu li a:hover,
    .submenu li a.active {
        background-color: #007bff !important;
        color: #fff !important;
        border-radius: 6px;
    }

    .sidebar-menu li a:hover .micon,
    .sidebar-menu li a:hover .mtext,
    .submenu li a:hover .mtext {
        color: #fff !important;
    }

    .submenu li a {
        padding-left: 42px !important;
    }

    .close-sidebar {
        padding-right: 50px;
        padding-left: 10px;
    }
</style>

<div class="left-side-bar">
    <div class="brand-logo d-flex align-items-center justify-content-between px-3 py-2">
        <a href="{{ url('/') }}" class="d-flex align-items-center gap-2 text-decoration-none">
            <img src="{{ asset('assets/vendors/images/logo.png') }}" alt="SIDINYAM Logo" width="1000" />
        </a>
        <div class="close-sidebar px-2" data-toggle="left-sidebar-close">
    <i class="ion-close-round text-white"></i>
</div>

    </div>

    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu" class="pt-2">

                <li>
                    <a href="{{ url('/') }}" class="dropdown-toggle no-arrow {{ selected('dashboard') }}">
                        <span class="micon bi bi-grid-fill"></span><span class="mtext">Beranda</span>
                    </a>
                </li>

                @role('user')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-clipboard2-pulse-fill"></span><span class="mtext">Konsultasi</span>
                        </a>
                        <ul class="submenu">
                            <li><a class="{{ selected('diagnosis') }}" href="{{ route('diagnosis.index') }}">Tambah Konsultasi</a></li>
                            <li><a class="{{ selected('riwayat-diagnosis') }}" href="{{ route('riwayat-diagnosis') }}">Riwayat Konsultasi</a></li>
                        </ul>
                    </li>
                @endrole

                @role('admin')
                    <li>
                        <a href="{{ route('data-admin.index') }}" class="dropdown-toggle no-arrow {{ selected('data-admin') }}">
                            <span class="micon bi bi-people-fill"></span><span class="mtext">Data Pengguna</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-clipboard2-pulse-fill"></span><span class="mtext">Data Konsultasi</span>
                        </a>
                        <ul class="submenu">
                            <li><a class="{{ selected('diagnosis') }}" href="{{ route('diagnosis.index') }}">Tambah Konsultasi</a></li>
                            <li><a class="{{ selected('riwayat-diagnosis') }}" href="{{ route('riwayat-diagnosis') }}">Riwayat Konsultasi</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ url('dashboard/penyakit') }}" class="dropdown-toggle no-arrow {{ selected('penyakit') }}">
                            <span class="micon bi bi-bug-fill"></span><span class="mtext">Penyakit</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('dashboard/gejala') }}" class="dropdown-toggle no-arrow {{ selected('gejala') }}">
                            <span class="micon bi bi-heart-pulse-fill"></span><span class="mtext">Gejala</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('dashboard/pengetahuan') }}" class="dropdown-toggle no-arrow {{ selected('pengetahuan') }}">
                            <span class="micon bi bi-diagram-3-fill"></span><span class="mtext">Pengetahuan</span>
                        </a>
                    </li>
                @endrole

                @guest
                    <li>
                        <a href="{{ route('register') }}" class="dropdown-toggle no-arrow {{ selected('register') }}">
                            <span class="micon bi bi-person-lines-fill"></span><span class="mtext">Registrasi</span>
                        </a>
                    </li>
                @endguest

                <li>
                    <a href="{{ route('about') }}" class="dropdown-toggle no-arrow {{ selected('about') }}">
                        <span class="micon bi bi-info-circle-fill"></span><span class="mtext">Tentang</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
