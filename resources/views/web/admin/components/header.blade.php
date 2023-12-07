<div class="navbar-bg bg-primary"></div>
<nav class="navbar navbar-expand-lg main-navbar bg-primary">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#"
                    data-toggle="sidebar"
                    class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#"
                    data-toggle="search"
                    class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
       
    </form>
   <ul class="" style="list-style: none">
    <li class="dropdown"><a type="button"
        data-toggle="dropdown"
        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image"
            src="{{ auth()->user()->profile_picture }}"
            class="rounded-circle mr-1 object-fit-cover" style="height: 40px; width:40px">
        <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Anda Sedang Login</div>
        <a href="/admin/profile"
            class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
        </a>
       
        <a href="/admin/setting"
            class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
   </ul>
</nav>
