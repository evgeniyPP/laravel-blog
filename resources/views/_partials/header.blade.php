<header class="header  push-down-20">
    <div class="container">
        <div class="logo pull-left">
            <a href={{ route('index') }}>
                <img src={{ asset('storage/images/logo.png') }} alt="Logo" width="352" height="140">
            </a>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#readable-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="collapse navbar-collapse" id="readable-navbar-collapse">
                <ul class="navigation">
                    @can ('add', \App\Post::class)
                    <li>
                        <a href={{ route('post.add_get') }} class="dropdown-toggle" data-toggle="dropdown">Добавить пост</a>
                    </li>
                    @endcan
                    @if (request()->user())
                        <li>
                            <a href={{ route('auth.logout') }} class="dropdown-toggle" data-toggle="dropdown">
                                Выйти ({{request()->user()->login}})
                            </a>
                        </li>
                    @else
                        <li>
                            <a href={{ route('auth.login_get') }} class="dropdown-toggle" data-toggle="dropdown">Войти</a>
                        </li>
                    @endif                    
                </ul>
            </div>
        </nav>
        {{-- <div class="hidden-xs hidden-sm">
            <a href="#" class="search__container  js--toggle-search-mode"> <span class="glyphicon  glyphicon-search"></span> </a>
        </div> --}}
    </div>
</header>