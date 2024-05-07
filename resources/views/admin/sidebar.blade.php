<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Sipelita</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<div class="sidebar-heading">
    Dashboard
</div>

{{-- {{-- <!-- Nav Item - Dashboard --> --}}
<li class="nav-item active">
    <a class="nav-link" href="{{ route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Kelola
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item active">
    <a class="nav-link" href="{{url('datapengguna')}}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Data Pengguna</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="{{url('datagejala')}}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Data Gejala</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="{{url('datapenyakit')}}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Data Penyakit</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="{{url('rule')}}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Rule</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Diagnosa
</div>

<li class="nav-item active">
    <a class="nav-link" href="{{ route('diagnosa')}}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Diagnosa Penyakit</span>
    </a>
</li>

{{-- <li class="nav-item active">
    <a class="nav-link" href="{{url('riwayat')}}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Riwayat</span>
    </a>
</li> --}}

<!-- Divider -->
{{-- <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> --}}

</ul>
<!-- End of Sidebar -->