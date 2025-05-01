{{-- <div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Layout Settings
            <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="pb-10 weight-600 font-18">Header Background</h4>
            <div class="mb-10 sidebar-btn-group pb-30">
                <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
            </div>

            <h4 class="pb-10 weight-600 font-18">Sidebar Background</h4>
            <div class="mb-10 sidebar-btn-group pb-30">
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
            </div>

            <h4 class="pb-10 weight-600 font-18">Menu Dropdown Icon</h4>
            <div class="pb-10 mb-10 sidebar-radio-group">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                        value="icon-style-1" checked="" />
                    <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                        value="icon-style-2" />
                    <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                        value="icon-style-3" />
                    <label class="custom-control-label" for="sidebaricon-3"><i
                            class="fa fa-angle-double-right"></i></label>
                </div>
            </div>

            <h4 class="pb-10 weight-600 font-18">Menu List Icon</h4>
            <div class="mb-10 sidebar-radio-group pb-30">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-1" checked="" />
                    <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-2" />
                    <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                            aria-hidden="true"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-3" />
                    <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-4" checked="" />
                    <label class="custom-control-label" for="sidebariconlist-4"><i
                            class="icon-copy dw dw-next-2"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-5" />
                    <label class="custom-control-label" for="sidebariconlist-5"><i
                            class="dw dw-fast-forward-1"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-6" />
                    <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                </div>
            </div>

            <div class="text-center reset-options pt-30">
                <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
            </div>
        </div>
    </div>
</div> --}}

<?php

function selected($url)
{
    if (last(request()->segments()) == $url) {
        return 'active';
    }
}
?>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href={{ url('/') }}>
            <img src={{ asset('assets/vendors/images/deskapp-logo.svg') }} alt="" class="dark-logo" />
            <img src={{ asset('assets/vendors/images/logo.png') }} alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href={{ url('/') }} class="dropdown-toggle no-arrow <?= selected('dashboard') ?>">
                        <span class="micon bi bi-house-fill"></span><span class="text">Home</span>
                    </a>

                </li>

                @role('user')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-clipboard2-pulse-fill"></span><span class="mtext">Konsultasi</span>
                        </a>
                        <ul class="submenu">
                            <li><a class="<?= selected('diagnosis') ?>" href={{ route('diagnosis.index') }}>Tambah
                                    Konsultasi</a>
                            </li>
                            <li><a class="<?= selected('riwayat-diagnosis') ?>"
                                    href={{ route('riwayat-diagnosis') }}>Riwayat Konsultasi</a></li>
                        </ul>
                    </li>
                @endrole

                @role('admin')
                    <li>
                        <a href={{ route('data-admin.index') }}
                            class="dropdown-toggle no-arrow <?= selected('data-admin') ?>">
                            <span class="micon bi bi-people-fill"></span><span class="mtext">Data User</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-clipboard2-pulse-fill"></span><span class="mtext">Data
                                Konsultasi</span>
                        </a>
                        <ul class="submenu">
                            <li><a class="<?= selected('diagnosis') ?>" href={{ route('diagnosis.index') }}>Tambah
                                    Konsultasi</a>
                            </li>
                            <li><a class="<?= selected('riwayat-diagnosis') ?>"
                                    href={{ route('riwayat-diagnosis') }}>Riwayat Konsultasi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href={{ url('dashboard/penyakit') }}
                            class="dropdown-toggle no-arrow <?= selected('penyakit') ?>">
                            <span class="micon bi bi-bug-fill"></span><span class="mtext">Penyakit</span>
                        </a>

                    </li>

                    <li>
                        <a href={{ url('dashboard/gejala') }} class="dropdown-toggle no-arrow <?= selected('gejala') ?>">
                            <span class="micon bi bi-heart-pulse-fill"></span><span class="mtext">Gejala</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href={{ url('dashboard/pengetahuan') }}
                            class="dropdown-toggle no-arrow <?= selected('pengetahuan') ?>">
                            <span class="micon bi bi-diagram-3-fill"></span><span class="mtext">Pengetahuan </span>
                        </a>

                    </li>
                @endrole
                @guest
                    <li class="dropdown">
                        <a href={{ route('register') }} class="dropdown-toggle no-arrow <?= selected('register') ?>">
                            <span class="micon bi bi-person-plus-fill"></span><span class="mtext">Registrasi </span>
                        </a>
                    </li>
                @endguest

                <li class="dropdown">
                    <a href={{ route('about') }} class="dropdown-toggle no-arrow <?= selected('about') ?>">
                        <span class="micon bi bi-exclamation-circle-fill"></span><span class="mtext">Tentang </span>
                    </a>

                </li>
            </ul>
        </div>
    </div>
</div>
