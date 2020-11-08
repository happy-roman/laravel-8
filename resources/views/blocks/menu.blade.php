
<ul class="navbar-nav ml-auto mb-2 mb-lg-0 smooth-scroll">
    <li><a class="nav-link waves-effect rounded mx-2
        {{ Request::is('home') || Request::path() ==  '/home' ? 'active' : ''  }}" href="{{ route('home') }}">Главная</a></li>
    <li><a class="nav-link waves-effect rounded mx-2
        {{ Request::path() ==  'about' ? 'active' : ''  }}" href="{{ route('about.index') }}">О портале</a></li>
    <li><a class="nav-link waves-effect rounded mx-2
        {{ Request::is('news/*') || Request::path() ==  'news' ? 'active' : ''  }}"
           href="{{ route('news.category') }}">Новости</a></li>
    @if( Auth::user() && Auth::user()->is_admin !== 0)
    <li><a class="nav-link waves-effect rounded mx-2
        {{ Request::is('admin/*') || Request::path() ==  'admin' ? 'active' : ''  }}"
           href="{{ route('admin.index') }}">Админка</a></li>
    @endif
</ul>
