
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin/admin" class="brand-link">
            <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">PET SHOP</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <a href="/admin/admin" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-bars"></i>
                            <p>
                                Danh M???c
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/menus/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Th??m danh m???c</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/menus/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh s??ch danh m???c</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                S???n ph???m
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="/admin/products/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Th??m s???n ph???m</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/products/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh s??ch s???n ph???m</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                ????n H??ng
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/carts/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh s??ch ????n h??ng</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-male"></i>
                            <p>
                                Th??nh Vi??n
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="/admin/members/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Th??m th??nh vi??n</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/members/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh s??ch th??nh vi??n</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-comment"></i>
                            <p>
                                ????nh Gi??
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/reviews/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh s??ch ????nh gi??</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(auth()->id() === 1)
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Nh??n Vi??n
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="/admin/employees/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Th??m nh??n vi??n</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/employees/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh s??ch nh??n vi??n</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Slider
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/sliders/add" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Th??m slider</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/sliders/list" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh s??ch slider</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                Th??ng tin shop
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/infos/info" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Th??ng tin shop pet</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>
                                Li??n h???
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/contacts/contact" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Th??ng tin li??n h???</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
