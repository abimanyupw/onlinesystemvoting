 <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="" alt="" class="img-fluid rounded-circle mb-3 mt-2" style="width: 80px; height: 80px;">
                                <span class="text-center text-white mb-1 fs-6 fw-semibold">{{ auth()->user()->name }}</span>
                                <span class="text-center text-muted fs-6">{{ auth()->user()->email }}</span>
                            </div>

                            <div class="sb-sidenav-menu-heading fw-bold"><span class="fs-6">GENERAL</span></div>
                            <a class="nav-link fs-5 {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt fa-lg"></i></div><span class="fw-semibold ">Dashboard</span>
                            </a>
                            <a class="nav-link fs-5 {{ Request::is('result*') ? 'active' : '' }}" href="/result">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-day fa-lg"></i></div><span class="fw-semibold ">Event Voting</span>
                            </a>
                            @can('admin')
                            <div class="sb-sidenav-menu-heading fw-bold"><span class="fs-6">ADMINISTRATOR</span></div>
                            <a class="nav-link collapsed fs-5" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns fa-lg"></i></div>
                                <span class="fw-semibold">
                                Kelola Data
                                </span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link fs-5 {{ Request::is('') ? 'active' : '' }}" href=""><div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie fa-lg"></i></div><span class="fw-semibold">Kandidat</span></a>
                                    <a class="nav-link fs-5 {{ Request::is('') ? 'active' : '' }}" href=""><div class="sb-nav-link-icon"><i class="fa-solid fa-user fa-lg"></i></div><span class="fw-semibold">User</span></a>
                                    <a class="nav-link fs-5 {{ Request::is('') ? 'active' : '' }}" href=""><div class="sb-nav-link-icon"><i class="fa-solid fa-calendar fa-lg"></i></div><span class="fw-semibold">Event</span></a>
                                    
                                </nav>
                            </div>  
                             @endcan             
                    </div>
                </nav>
            </div>