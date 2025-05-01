<div class="header" e">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>

    </div>

    @auth
        <div class="header-right">

            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src={{ asset('assets/vendors/images/profile.png') }} alt="" />
                        </span>
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href={{ route('profile.edit') }}><i class="dw dw-user1"></i> Profile</a>
                        {{-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a> --}}
                        {{-- <a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a> --}}
                        <!-- Authentication -->
                        <form class="dropdown-item" method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href={{ route('logout') }}
                                onclick="event.preventDefault();
                                                    this.closest('form').submit();"><i
                                    class="dw dw-logout"></i>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg"
                    alt="" /></a>
        </div> --}}
        </div>
    @endauth
    @guest
        <div class="header-right">
            <a href="/login" class="p-4 d-flex align-items-center" style="gap: 0.3rem">
                <i class="icon-copy bi bi-box-arrow-in-right"></i>
                <h6>Login</h6>
            </a>
        </div>
    @endguest
</div>
