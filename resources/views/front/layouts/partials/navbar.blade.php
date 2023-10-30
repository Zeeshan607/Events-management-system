
@php
    use Illuminate\Http\Request;
@endphp
<nav class="navbar navbar-expand-md navbar-dark fixed-top ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <figure class="logo">
                <img src="{{asset('web/assets/images/Logo-white.png')}}" alt="logo here">
            </figure>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('events') || request()->is('events/*')) ? 'active' : '' }}" href="{{route("events")}}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="/about">About</a>
                </li>

            </ul>
            <a href="{{route("eo.register")}}" class="btn btn-success btn-sm">Become Event organizer</a>
            <ul class="navbar-nav ">

                    @if(Auth::guard('web')->check())
                    <li class="nav-item ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLoginDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-user text-white"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <h6 class="dropdown-item text-capitalize">
                                        <i class="fa fa-sign-in-alt"></i>
                                        {{Auth::guard('web')->user()->name}}
                                    </h6>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                            <li class="nav-item ">
                                <a class="nav-link"  aria-current="page" href="/login">Signin</a>
                            </li>
                        @endif

            </ul>

        </div>
    </div>
</nav>
