<nav class="main-header navbar navbar-expand navbar-white navbar-light justify-between">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block relative" x-data="{ open: false }">
            <div class="user-details flex align-items-center cursor-pointer" x-on:click="open = ! open">
                <div class="user-icon mr-2">
                    <img src="{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}" width="30" height="30">
                </div>
                <div class="user">
                    <b>
                        {{ Auth::user()->name }}
                    </b>
                </div>
                <svg class="-mr-1 ml-1 h-5 w-5 transition duration-500" xmlns="http://www.w3.org/2000/svg" :class="open ? 'rotate-180' : ''"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="dropdown absolute top-12 right-0 bg-white w-[200px] p-2" x-show="open" x-transition
                @click.outside="open = false" style="display: none">
                <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">
                    Update Details
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    Update Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>