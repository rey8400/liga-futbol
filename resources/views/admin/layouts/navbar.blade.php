<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
  
    </form>
   
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1" style="display: none">
        <div class="d-sm-none d-lg-inline-block">Hola, {{  Auth::user()->name }} , {{  Auth::user()->rol }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Opciones</div>
          <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Perfil
          </a>
          <a href="features-activities.html" class="dropdown-item has-icon" style="display: none">
            <i class="fas fa-bolt"></i> Activities
          </a>
          <a href="features-settings.html" class="dropdown-item has-icon" style="display: none">
            <i class="fas fa-cog"></i> Settings
          </a>


          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesion
              </a>
        </form>
        </div>
      </li>
    </ul>
  </nav>