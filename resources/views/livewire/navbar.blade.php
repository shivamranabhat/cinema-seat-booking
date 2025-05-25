<div>
  <section class="navigation-bar py-4">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="/"><img class="logo" src="{{asset('main/images/plex-logo.svg')}}" alt="Logo" /></a>
      <div class="nav-actions d-flex align-items-center">
        <ul class="nav-links p-0 m-0 d-none d-sm-none d-md-none d-lg-flex d-xl-flex">
          <li><a href="{{route('home.movies')}}" class="{{request()->segment(1)=='movies' ? 'active' : ''}}">Now
              Showing</a></li>
          <li><a href="">Features</a></li>
          <li><a href="">Download</a></li>
           @if(!auth()->user())
          <li><a href="{{route('login')}}">Signin</a></li>
          @endif
        </ul>
         @if(auth()->user())
        <button wire:click="logout" class="btn button">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-box-arrow-right"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
            <path fill-rule="evenodd"
              d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
          </svg>
        </button>
        @else
        <div class="buttons d-none d-sm-none d-md-none d-lg-block d-xl-block">
          <a href="{{route('signup')}}" class="btn button signup-btn bg-transparent mr-3">
            Signup Free
          </a>
        </div>
       @endif
      </div>
    </div>
  </section>
  <section class="ham-menu">
    <div class="container d-flex flex-column align-items-center">
      <!-- <img src="./asstes/close.svg" alt="" class="close" /> -->
      <ul class="ham-list mt-4 d-flex flex-column align-items-center">
        <li><a href="{{route('home.movies')}}">Now Showing</a></li>
        <li><a href="#">Features</a></li>
        <li><a href="#">Download</a></li>
      </ul>
      <div class="buttons col-12 container ham-menu-buttons d-flex flex-column align-items-center mt-4 rounded">
        @if(auth()->user())
        <button wire:click="logout" class="btn button">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-box-arrow-right"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
            <path fill-rule="evenodd"
              d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
          </svg>
        </button>
        @else
        <div class="search-section-content py-5 col-12 text-center">
          <h3 class="sub-heading-sm">Login or Register on</h3>
          <h1 class="sub-heading mb-4">PLEX MOVIES</h1>
          <a href="{{route('login')}}" class="btn btn-lg button col-8 login-btn mb-2">
            Login
          </a>
          <a href="{{route('signup')}}" class="btn btn-lg col-8 signup-btn bg-transparent text-white mt-1">
            Signup
          </a>
        </div>
        @endif
      </div>
    </div>
  </section>
</div>