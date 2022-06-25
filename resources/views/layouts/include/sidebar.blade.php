<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Bảng điều khiển</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý phim
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-list-ul"></i>
            <span>Danh mục</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('genre.index') }}">
            <i class="fas fa-bars"></i>
            <span>Thể loại</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('country.index') }}">
            <i class="fas fa-globe-africa"></i>
            <span>Quốc gia</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('movie.index') }}">
            <i class="fas fa-video"></i>
            <span>Phim</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('episode.index') }}">
            <i class="fas fa-film"></i>
            <span>Tập phim</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    <!-- Sidebar Message -->
</ul>
