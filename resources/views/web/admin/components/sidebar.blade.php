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
            <li class="{{ request()->is('admin/books') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin/books"><i class="fas fa-th"></i> <span>Products Management</span></a>
            </li>
            <li class="{{ request()->is('admin/affiliate') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin/affiliate"><i class="fas fa-th"></i> <span>Affiliate Management</span></a>
            </li>
           {{--  <li class="{{ request()->is('admin/product') ? 'active' : '' }}">
                <a class="nav-link"
                    href="/admin/product"><i class="fas fa-th"></i> <span>Single Product</span></a>
            </li> --}}
            
           @if (auth()->user()->hasRole('super_admin'))
           <li class="menu-header">Book</li>
           <li class="{{ request()->is('admin/book/create') ? 'active' : '' }}">
               <a class="nav-link"
                   href="/admin/book/create"><i class="fas fa-th"></i> <span>Post Book</span></a>
           </li>
           <li class="menu-header">Chapters</li>
           <li class="{{ request()->is('admin/chapter') ? 'active' : '' }}">
               <a class="nav-link"
                   href="/admin/chapter"><i class="fas fa-th"></i> <span>Assign Chapters</span></a>
           </li>
           <li class="menu-header">Products</li>
           <li class="{{ request()->is('admin/product/create') ? 'active' : '' }}">
               <a class="nav-link"
                   href="/admin/product/create"><i class="fas fa-th"></i> <span>Posting Product</span></a>
           </li>
           <li class="{{ request()->is('admin/product/chapter') ? 'active' : '' }}">
               <a class="nav-link"
                   href="/admin/product/chapter"><i class="fas fa-th"></i> <span>Assign Chapters To Product</span></a>
           </li>
           @endif
            
        </ul>

        
    </aside>
</div>
