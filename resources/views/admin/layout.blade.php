<div class="page-wrapper">

    <!-- HEADER MOBILE-->
    <header class="header-mobile border-bottom border-secondary d-block d-lg-none ">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="dashboard">
                        <img src="assets/images/icon/logo.png" alt="CoolAdmin" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile ">
            <div class="container-fluid p-0">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="">
                        <a href="dashboard">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="category">
                            <i class="fas fa-copy"></i>Product Category</a>
                    </li>
                    <li>
                        <a href="product">
                            <i class="fas fa-copy"></i>Products</a>
                    </li>
                    <li>
                        <a href="order_info">
                            <i class="fas fa-copy"></i>Orders</a>
                    </li>
                    <li>
                        <a href="shipping">
                            <i class="fas fa-copy"></i>Shipping</a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fas fa-copy"></i>Contact Info</a>
                    </li>

                    <li>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content pt-3">
                                    <form class="au-form-icon--sm" action="{{ route('search') }}" method="post">@csrf
                                        <input class=" au-input--style2" type="text" placeholder="Search" name="query" value="">
                                        <button class="au-btn--submit2" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('logout') }}">
                            <button class="btn btn-secondary w-100"> Logout</button></a>
                    </li>

                </ul>
            </div>

        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="dashboard">
                <img src="assets/images/icon/logo.png" alt="Cool Admin" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="">
                        <a href="dashboard">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="category">
                            <i class="fas fa-copy"></i>Product Category</a>
                    </li>
                    <li>
                        <a href="product">
                            <i class="fas fa-copy"></i>Products</a>
                    </li>
                    <li>
                        <a href="order_info">
                            <i class="fas fa-copy"></i>Orders</a>
                    </li>
                    <li>
                        <a href="shipping">
                            <i class="fas fa-copy"></i>Shipping</a>
                    </li>
                    <li>
                        <a href="contact_info">
                            <i class="fas fa-copy"></i>Contact Info</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <!-- HEADER DESKTOP-->
        <header class="header-desktop d-none d-lg-block">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap justify-content-end">
                        <div class="header-button">
                            <div class="header-button-item js-item-menu">
                                <i class="zmdi zmdi-search text-muted"></i>
                                <div class="search-dropdown js-dropdown">
                                    <form action="{{ route('search') }}" method="post">@csrf
                                        <input class="au-input au-input--full au-input--h65" type="text"
                                            placeholder="Search" name="query" value="" />
                                        <button >
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search text-muted"></i>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">john doe</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">john doe</a>
                                                </h5>
                                                {{-- <span class="email">johndoe@example.com</span> --}}
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="{{ route('logout') }}">
                                                <i class="zmdi zmdi-power"></i>Logout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->
        @yield('main')

    </div>
    <!-- END PAGE CONTAINER-->


</div>
