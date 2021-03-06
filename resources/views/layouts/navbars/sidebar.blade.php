<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/logo.jpg" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/brand/logo.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/logo.jpg">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>

                @if(strtolower(auth()->user()->email) == 'darsh.sultan8@gmail.com')
                <li class="nav-item">
                    <a class="nav-link active" href="#admin" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-user-secret" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Admin') }}</span>
                    </a>

                    <div class="collapse show" id="admin">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.create') }}">
                                    {{ __('New Admin') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.index') }}">
                                    {{ __('Admin Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="#user" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-users text-blue"></i>
                        <span class="nav-link-text">{{ __('User') }}</span>
                    </a>

                    <div class="collapse" id="user">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.create') }}">
                                    {{ __('New User') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>


                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/lnews">
                        <i class="far fa-newspaper text-blue"></i> {{ __('Latest News') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/journals">
                        <i class="fas fa-newspaper text-blue"></i> {{ __('Journals') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/volumes">
                        <i class="fas fa-folder text-blue"></i> {{ __('Volumes') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/issues">
                        <i class="fas fa-folder text-blue"></i> {{ __('Issues') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/articles">
                        <i class="far fa-newspaper text-blue"></i> {{ __('Articles') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/rtopics">
                        <i class="fas fa-search text-blue"></i> {{ __('Research Topics') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/editors">
                        <i class="fas fa-user-edit text-blue"></i> {{ __('Editors') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/branches">
                        <i class="far fa-building text-blue"></i> {{ __('Branches') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
