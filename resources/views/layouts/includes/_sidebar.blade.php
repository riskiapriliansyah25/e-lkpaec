<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-LKP AEC</div>
    </a>
    @if(Auth::user()->role == 'pimpinan')
    <!-- Divider -->
    <hr class="sidebar-divider my-2">


    <!-- Heading -->
    <div class="sidebar-heading">
        Pimpinan
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('pimpinan') ? 'active' : ''}}">
    
        <a class="nav-link" href="{{url('/pimpinan')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Nav Item - Pendaftar -->
    <li class="nav-item {{ Request::is('*pendaftar*') ? 'active' : ''}}">
    
        <a class="nav-link" href="{{url('/pimpinan/pendaftar')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Pendaftar</span></a>
    </li>
    <!-- Nav Item - Siswa -->
    <li class="nav-item {{ Request::is('*siswa*') ? 'active' : ''}}">
    
        <a class="nav-link" href="{{url('/pimpinan/siswa')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Siswa</span></a>
    </li>
    <!-- Nav Item - Instruktur -->
    <li class="nav-item {{ Request::is('*instruktur*') ? 'active' : ''}}">
    
        <a class="nav-link" href="{{url('/pimpinan/instruktur')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Instruktur</span></a>
    </li>
    <!-- Nav Item - Buku -->
    <li class="nav-item {{ Request::is('*buku*') ? 'active' : ''}}">
    
        <a class="nav-link" href="{{url('/pimpinan/buku')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Buku</span></a>
    </li>
    <!-- Nav Item - Kelas -->
    <li class="nav-item {{ Request::is('*kelas*') ? 'active' : ''}}">
    
        <a class="nav-link" href="{{url('/pimpinan/kelas')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Kelas</span></a>
    </li>
    <!-- Nav Item - Nilai Ujian -->
    <li class="nav-item {{ Request::is('*nilai-ujian*') ? 'active' : ''}}">
    
        <a class="nav-link" href="{{url('/pimpinan/nilai-ujian')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Nilai Ujian</span></a>
    </li>
    
     

    @endif



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
                <a class="collapse-item {{ Request::is('pendaftar*') ? 'active' : ''}}" href="{{url('/pendaftar')}}">Pendaftar</a>
                <a class="collapse-item {{ Request::is('siswa*') ? 'active' : ''}}" href="{{url('/siswa')}}">Siswa</a>
                <a class="collapse-item {{ Request::is('instruktur*') ? 'active' : ''}}" href="{{url('/instruktur')}}">Instruktur</a>
                <a class="collapse-item {{ Request::is('buku*') ? 'active' : ''}}" href="{{url('/buku')}}">Buku</a>
                <a class="collapse-item {{ Request::is('coba*') ? 'active' : ''}}" href="{{url('/coba')}}">Kelas</a>
            </div>
        </div>
    </li>


    <li class="nav-item {{ Request::is('user*') ? 'active' : ''}}">
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
                <a class="collapse-item {{ Request::is('soal-latihan*') ? 'active' : ''}}" href="{{url('/soal-latihan')}}">Soal Latihan</a>
                @if(Auth::user()->role == 'admin')
                <a class="collapse-item {{ Request::is('soal') ? 'active' : ''}}" href="{{url('/soal')}}">Soal Ujian</a>
                @endif
                <a class="collapse-item {{ Request::is('materi*') ? 'active' : ''}}" href="{{url('/materii')}}">Materi</a>
                <a class="collapse-item {{ Request::is('laporanujian*') ? 'active' : ''}}" href="{{url('/laporanujian')}}">Laporan Ujian</a>
                <a class="collapse-item {{ Request::is('laporanlatihan*') ? 'active' : ''}}" href="{{url('/laporanlatihan')}}">Laporan Latihan</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOnee" aria-expanded="true"
            aria-controls="collapseOnee">
            <i class="fas fa-fw fa-database"></i>
            <span>Rapot</span>
        </a>
        <div id="collapseOnee" class="collapse" aria-labelledby="headingOnee" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/rapot/kriteria')}}">Kriteria</a>
                <a class="collapse-item" href="{{url('/rapot')}}">Rapot Siswa</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOneee" aria-expanded="true"
            aria-controls="collapseOnee">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Pembayaran</span>
        </a>
        <div id="collapseOneee" class="collapse" aria-labelledby="headingOnee" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('paket*') ? 'active' : ''}}" href="{{url('/paket')}}">Paket</a>
                <a class="collapse-item {{ Request::is('pembayaran*') ? 'active' : ''}}" href="{{url('/pembayaran')}}">Pembayaran</a>
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
                <a class="collapse-item" href="{{url('/soal-latihan')}}">Soal Latihan</a>
                <a class="collapse-item" href="{{url('/materii')}}">Materi</a>
                <a class="collapse-item" href="{{url('/laporanlatihan')}}">Laporan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/kelas')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>Kelas yang diajar</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOnee" aria-expanded="true"
            aria-controls="collapseOnee">
            <i class="fas fa-fw fa-database"></i>
            <span>Rapot</span>
        </a>
        <div id="collapseOnee" class="collapse" aria-labelledby="headingOnee" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/rapot')}}">Rapot Siswa</a>
            </div>
        </div>
    </li>
    @endif

    @if(Auth::user()->role == 'pimpinan')
    @else
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
    @endif
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->
