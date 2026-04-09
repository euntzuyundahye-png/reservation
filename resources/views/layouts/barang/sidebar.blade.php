<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="#" class="brand-link">
            <span class="brand-text fw-light">Barang</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">

            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" data-accordion="false"
                id="navigation">

                <!-- DASHBOARD -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard Barang
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <!-- BARANG -->
                        <li class="nav-item">
                            <a href="{{ route('barang.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-box"></i>
                                <p>Data Barang</p>
                            </a>
                        </li>

                        <!-- LOGOUT -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="event.preventDefault(); if(confirm('Yakin logout?')) document.getElementById('logout-form').submit();">
                                <i class="nav-icon bi bi-box-arrow-right"></i>
                                <p>Logout</p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>

            </ul>
            <!--end::Sidebar Menu-->

        </nav>
    </div>
    <!--end::Sidebar Wrapper-->

</aside>
<!--end::Sidebar-->