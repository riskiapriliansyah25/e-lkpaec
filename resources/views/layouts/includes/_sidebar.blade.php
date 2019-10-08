<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-LKP AEC</div>
    </a>
    @if(Auth::user()->role == 'admin')
    <!-- Divider -->
    <hr class="sidebar-divider my-2">


    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>


    <!-- Nav Item - Dashboard -->
    @if(!empty($title) && $title == 'Dashboard')
    <li class="nav-item active">
        @else
    <li class="nav-item">
        @endif
        <a class="nav-link" href="{{url('/admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
            aria-controls="collapseOne">
            <i class="fas fa-fw fa-database"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/pendaftar')}}">Pendaftar</a>
                <a class="collapse-item" href="{{url('/siswa')}}">Siswa</a>
                <a class="collapse-item" href="{{url('/instruktur')}}">Instruktur</a>
                <a class="collapse-item" href="{{url('/buku')}}">Buku</a>
                <a class="collapse-item" href="{{url('/coba')}}">Kelas</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{url('/user/daftar')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Management User</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>E-Learning</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/soal')}}">Soal</a>
                <a class="collapse-item" href="{{url('/materii')}}">Materi</a>
                <a class="collapse-item" href="{{url('/instruktur')}}">Laporan</a>
            </div>
        </div>
    </li>
    @endif
    <!-- instruktur -->
    @if(Auth::user()->role == 'instruktur')
    <!-- Divider -->
    <hr class="sidebar-divider my-2">
    <!-- Heading -->
    <div class="sidebar-heading">
        Instruktur
    </div>
    @endif
    @if(Auth::user()->role == 'instruktur')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>E-Learning</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/soal')}}">Soal</a>
                <a class="collapse-item" href="{{url('/materii')}}">Materi</a>
                <a class="collapse-item" href="{{url('/instruktur')}}">Laporan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/kelas')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>Manajemen Kelas</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    @if(!empty($title) && $title == 'Profile')
    <a class="nav-item active">
        @else
        <li class="nav-item">
            @endif
            <a class="nav-link" href="{{url('/user')}}">
                <i class="fas fa-fw fa-user"></i>
                <span>My Profile</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">







        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->
