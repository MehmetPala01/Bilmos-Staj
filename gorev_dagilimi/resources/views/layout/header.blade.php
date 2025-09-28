<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                <i class="ficon feather icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"></a>
                        </li>
                    </ul>
                </div>

                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand"></a>
                    </li>
                    <li class="nav-item nav-search">
                        <a class="nav-link nav-link-search"></a>
                        <div class="search-input">
                            <div class="search-input-icon"></div>
                            <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="template-list">
                            <div class="search-input-close"></div>
                            <ul class="search-list search-list-main"></ul>
                        </div>
                    </li>

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">
                                    {{ Auth::check() ? Auth::user()->name . ' ' . Auth::user()->surname : 'Guest' }}
                                </span>
                                <span class="user-status">
                                    {{ Auth::check() ? Auth::user()->position : 'Available' }}
                                </span>
                            </div>
                            <span>
                                <img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">



                            <div class="dropdown-divider"></div>


                            @if(Auth::check())
                            <a class="dropdown-item" href="{{ route('profile.index', Auth::user()->id) }}">
                                    Profil
                                </a>


                            <a class="dropdown-item" href="{{ route('password.edit', Auth::user()->id) }}" >
                                    Şifre Değiştir
                                </a>


                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Çıkış Yap
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endif
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
