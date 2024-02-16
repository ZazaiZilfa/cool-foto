<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Cool Foto</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">CF</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }} ">
                <a  href="{{ url('home') }}"
                    class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('post') ? 'active' : '' }} ">
                <a  href="{{ url('post') }}"
                    class="nav-link "><i class="fas fa-fire"></i><span>Post</span></a>
            </li>
            <li class="{{ Request::is('kategori') ? 'active' : '' }} ">
                <a  href="{{ url('kategori') }}"
                    class="nav-link "><i class="fas fa-fire"></i><span>Kategori</span></a>
            </li>
            <li class="{{ Request::is('users') ? 'active' : '' }} ">
                <a  href="{{ url('users') }}"
                    class="nav-link "><i class="fas fa-fire"></i><span>Users</span></a>
            </li>
            <li class="{{ Request::is('payment') ? 'active' : '' }} ">
                <a  href="{{ url('payment') }}"
                    class="nav-link "><i class="fas fa-fire"></i><span>Payment</span></a>
            </li>
        </ul>


    </aside>
</div>
