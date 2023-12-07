<div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas"
aria-labelledby="suhaOffcanvasLabel">
    <!-- Close button-->
    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <!-- Offcanvas body-->
    <div class="offcanvas-body">
        <!-- Sidenav Profile-->
        <div class="sidenav-profile">
            <div class="user-profile"><img src="{{ auth()->user()->profile_picture }}" alt="" style="height: 75px; width:75px"></div>
            <div class="user-info">
                <h5 class="user-name mb-1 text-white">{{auth()->user()->name}}</h5>
            </div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav ps-0">
            <li><a href="/customer/profile"><i class="fa-solid fa-user"></i>My Profile</a></li>
            <li><a href="{{route('customer.playlists.show', 1)}}"><i class="fas fa-headphones"></i>Playlist</a></li>
            <li><a href="{{route('customer.orders.index')}}"><i class="fas fa-file-invoice"></i>Transaksi</a></li>
            <li><a href="{{route('customer.setting')}}"><i class="fa-solid fa-sliders"></i>Settings</a></li>
            <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="fa-solid fa-toggle-off"></i>Sign Out</a></li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>