<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('img/logo.png') }}" alt="SISURAT Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-light">SISURAT | BPS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (auth()->user()->image)
                    <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-circle elevation-2"
                        alt="User Image">
                @else
                    <i class="bi bi-person-fill" style="font-size: 30px;"></i>
                @endif
            </div>
            <div class="info">
                <a href="{{ route('profile.index') }}" class="d-block">{{ auth()->user()->nama }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item {{ request()->is('dashboard') ? 'menu-open' : '' }}">
                    <a href="{{ url('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-house-door"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-header">DATA MASTER</li>
                <li class="nav-item {{ str_contains(request()->getRequestUri(), 'surat_masuk') ? 'menu-open' : '' }}">
                    <a href="{{ url('surat_masuk') }}"
                        class="nav-link {{ str_contains(request()->getRequestUri(), 'surat_masuk') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-envelope"></i>
                        <p>
                            Surat Masuk
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ str_contains(request()->getRequestUri(), 'surat_keluar') ? 'active' : '' }}">
                    <a href="{{ url('surat_keluar') }}"
                        class="nav-link  {{ str_contains(request()->getRequestUri(), 'surat_keluar') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-envelope-paper"></i>
                        <p>
                            Surat Keluar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('surat_tugas') }}" class="nav-link">
                        <i class="nav-icon bi bi-briefcase"></i>
                        <p>
                            Surat Tugas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('jenis_surat') }}" class="nav-link">
                        <i class="nav-icon bi bi-clipboard"></i>
                        <p>
                            Jenis Surat
                        </p>
                    </a>
                </li>
                <li class="nav-header">ADMINISTRATOR</li>
                <li class="nav-item">
                    <a href="{{ url('users') }}" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-header">CONFIGURATION</li>
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-person"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('faq') }}" class="nav-link">
                        <i class="nav-icon bi bi-info-circle"></i>
                        <p>FAQ</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Level 1
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Level 2
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

                @push('css-script')
                    <style>
                        .logout-btn:hover {
                            background-color: red;
                            color: white !important;
                        }
                    </style>
                @endpush
                <li class="nav-item">
                    <form action="{{ url('/logout') }}" method="post">
                        @csrf
                        <button href="#" class="nav-link btn text-left logout-btn"
                            onclick="return confirm('Anda yakin untuk logout!')" style="border: 0;">
                            {{-- <i class="nav-icon fas fa-solid fa-right-from-bracket"></i> --}}
                            <i class="nav-icon bi bi-box-arrow-right"></i>
                            <p>
                                Logout
                            </p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
