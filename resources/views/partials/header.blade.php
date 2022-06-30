<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto" style="padding: 1rem 0.5rem!important;">
      <li class=" nav-item d-none d-sm-inline-block">
          <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
              <span class="user-name mr-3">Welcome <b>{{ Auth::user()->name() }}</b></span>
              <span>
                  <img class="img-circle" src="" alt="avatar" height="35" width="35">
              </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#">
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