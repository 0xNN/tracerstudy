

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <div class="sidebar-brand-text mx-3">TRACER STUDY</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    @if (auth()->user()->is_admin !== 1)
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('profil')}}"aria-expanded="true" aria-controls="collapseTwo">
          <i class="fab fa-wpforms"></i>
          <span>Profil</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('Kuesioner')}}"aria-expanded="true" aria-controls="collapseTwo">
          <i class="fab fa-wpforms"></i>
          <span>Form Kuesioner</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
    @endif

    @if (auth()->user()->is_admin === 1)
    <!-- Divider -->
    {{-- <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Kuesioner
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('Kuesioner')}}"aria-expanded="true" aria-controls="collapseTwo">
        <i class="fab fa-wpforms"></i>
        <span>Form Kuesioner</span>
      </a>
    </li> --}}
    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}
    <!-- Heading -->

    <li class="nav-item">
      <a href="{{ route('pertanyaan_jawaban.index') }}" class="nav-link">
        <i class="fas fa-book-open"></i>
        <span>Pertanyaan Jawaban</span>
      </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Master
    </div>

    <li class="nav-item">
      <a href="{{ route('kuesioner_master.index') }}" class="nav-link">
        <i class="fas fa-book-open"></i>
        <span>Kuesioner</span>
      </a>
    </li>

    {{-- <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span>
      </a>
    </li> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('Pertanyaan')}}"  aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-question-circle"></i>
        <span>Pertanyaan</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('pertanyaan_tipe.index') }}">
        <i class="fas fa-filter"></i>
        <span>Tipe Pertanyaan</span>
      </a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="{{url('Jawaban')}}">
        <i class="fas fa-check-circle"></i>
        <span>Jawaban </span>
      </a>
    </li>

    {{-- <li class="nav-item">
      <a class="nav-link" href="{{url('Master')}}">
        <i class="fas fa-th-list"></i>
        <span>Master </span>
      </a>
    </li> --}}

    <li class="nav-item">
      <a class="nav-link" href="{{url('F1')}}">
        <i class="fas fa-users"></i>
        <span>Alumni</span>
      </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

