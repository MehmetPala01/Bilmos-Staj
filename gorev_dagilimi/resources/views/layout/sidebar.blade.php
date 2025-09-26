<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="/">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Bilmos</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"></a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{ request()->is('duties*') || request()->is('assignments*') ? 'active open' : '' }}">
                <a href="#">
                    <span class="menu-title">Görev İşlemleri</span>
                </a>

                <!-- Alt Menü -->
                <ul class="menu-content">
                    <li class="{{ request()->is('duties*') ? 'active' : '' }}">
                        <a href="{{ route('duties.index') }}">
                            <span class="menu-title" data-i18n="Data List">Görevler</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('assignments*') ? 'active' : '' }}">
                        <a href="{{ route('assignments.index') }}">
                            <span class="menu-title" data-i18n="Data List">Görev Atama</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <span class="menu-title" data-i18n="Data List">Personeller</span>
                    <span class="badge badge badge-primary badge-pill float-right mr-2"></span>
                </a>
            </li>

        </ul>
    </div>
</div>
