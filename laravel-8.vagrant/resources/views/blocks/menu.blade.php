<nav class="navbar navbar-expand-lg navbar-dark  bg-dark scrolling-navbar">
    <div class="container d-flex justify-content-between align-items-center ">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarRightAlignExample"
                    aria-controls="navbarRightAlignExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand text-light" href="#">< /happy_roman/ ></a>
        </div>
        <div class="collapse navbar-collapse" id="navbarRightAlignExample">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0 smooth-scroll">
                <li><a class="nav-link waves-effect waves-light
                    {{ Request::path() ==  '/' ? 'active' : ''  }}" href="{{ route('home') }}">Home</a></li>
                <li><a class="nav-link waves-effect waves-light
                    {{ Request::path() ==  'about' ? 'active' : ''  }}" href="{{ route('about.index') }}">About</a></li>
                <li><a class="nav-link waves-effect waves-light
                    {{ Request::is('news/*') || Request::path() ==  'news' ? 'active' : ''  }}"
                       href="{{ route('news.category') }}">News</a></li>
            </ul>
        </div>
    </div>
</nav>
