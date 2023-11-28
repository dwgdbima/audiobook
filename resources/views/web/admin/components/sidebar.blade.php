<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Suha</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Suha</a>
        </div>
        @php
            $type_menu = 'dashboard'
        @endphp
        <ul class="sidebar-menu">
            <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin"><i class="fas fa-th"></i> <span>User Management</span></a>
            </li>
            <li class="menu-header">Management</li>
            
            <li class="{{ Route::is('show.users') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin/users"><i class="fas fa-th"></i> <span>User Management</span></a>
            </li>
            <li class="{{ Route::is('show.orders') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin/orders"><i class="fas fa-th"></i> <span>Order Management</span></a>
            </li>
            
            
        </ul>

        
    </aside>
</div>
