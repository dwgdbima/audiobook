<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Suha</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Suha</a>
        </div>
       
        <ul class="sidebar-menu">
            <li class="{{ request()->is('admin') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin"><i class="fas fa-th"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Management</li>
            
            <li class="{{ request()->is('admin/users') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin/users"><i class="fas fa-th"></i> <span>User Management</span></a>
            </li>
            <li class="{{ request()->is('admin/orders') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin/orders"><i class="fas fa-th"></i> <span>Order Management</span></a>
            </li>
            <li class="{{ request()->is('admin/product') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin/product"><i class="fas fa-th"></i> <span>Single Product</span></a>
            </li>
            
            <li class="menu-header">Book</li>
            <li class="{{ request()->is('admin/book/create') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin/book/create"><i class="fas fa-th"></i> <span>Posting Buku</span></a>
            </li>
            
        </ul>

        
    </aside>
</div>
