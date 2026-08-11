<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
        <a href="{!! route('admin/dashboard') !!}" class="mb-0 brand-icon">
            <span class="logo-icon">
                <i class="bi bi-bag-check-fill fs-4"></i>
            </span>
            <span class="logo-text">{{ Auth::user()->name }}</span>
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            <li>
                <a class="m-link{{ Request::routeIs('admin/dashboard') ? ' active' : '' }}"
                    href="{!! route('admin/dashboard') !!}">
                    <i class="icofont-home fs-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Home Page -->
            <li>
                <a class="m-link{{ Request::routeIs('admin/homeadmin') ? ' active' : '' }}"
                    href="{!! route('home.index') !!}">
                    <i class="icofont-home fs-5"></i>
                    <span>Home Page</span>
                </a>
            </li>



            <li class="{{ Request::is('admin/industry*') ? ' active' : '' }}">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-industry-list" href="#">
                    <i class="icofont-truck-loaded fs-5"></i>
                    <span>Industry Management</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse{{ Request::is('admin/industry*') ? ' show' : '' }}"
                    id="menu-industry-list">
                    <li>
                        <a class="ms-link{{ Request::routeIs('industry.index') ? ' active' : '' }}"
                            href="{!! route('industry.index') !!}">
                            Industry Management
                        </a>
                    </li>
                    <li>
                        <a class="ms-link{{ Request::routeIs('product.index') ? ' active' : '' }}"
                            href="{!! route('industryfaq.index') !!}">
                            Industry FAQ
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/service*') ? ' active' : '' }}">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-service-list" href="#">
                    <i class="icofont-truck-loaded fs-5"></i>
                    <span>Service Management</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse{{ Request::is('admin/service*') ? ' show' : '' }}"
                    id="menu-service-list">
                    <li>
                        <a class="ms-link{{ Request::routeIs('service.index') ? ' active' : '' }}"
                            href="{!! route('service.index') !!}">
                            Service Management
                        </a>
                    </li>
                    <li>
                        <a class="ms-link{{ Request::routeIs('servicefaq.index') ? ' active' : '' }}"
                            href="{!! route('servicefaq.index') !!}">
                            Service FAQ
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/product*') ? ' active' : '' }}">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-product-list" href="#">
                    <i class="icofont-truck-loaded fs-5"></i>
                    <span>Product Management</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse{{ Request::is('admin/product*') ? ' show' : '' }}"
                    id="menu-product-list">
                    <li>
                        <a class="ms-link{{ Request::routeIs('product.index') ? ' active' : '' }}"
                            href="{!! route('product.index') !!}">
                            Product Management
                        </a>
                    </li>

                    <li>
                        <a class="ms-link{{ Request::routeIs('productfaq.index') ? ' active' : '' }}"
                            href="{!! route('productfaq.index') !!}">
                            Product FAQ
                        </a>
                    </li>
                </ul>
            </li>
            
              <li>
                <a class="m-link {{ Request::is('admin/blog*') ? 'active' : '' }}" href="{!! route('blog.index') !!}">
                    <i class="icofont-newspaper fs-5"></i>
                    <span>Blogs</span>
                </a>
            </li>
            
            <li class="{{ Request::is('admin/about*') ? ' active' : '' }}">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#about-list" href="#">
                    <i class="icofont-truck-loaded fs-5"></i>
                    <span>About Management</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse{{ Request::is('admin/product*') ? ' show' : '' }}"
                    id="about-list">
                    <li>
                        <a class="ms-link{{ Request::routeIs('about.index') ? ' active' : '' }}"
                            href="{!! route('about.index') !!}">
                            About Us
                        </a>
                    </li>
                    <!-- <li>
                        <a class="ms-link{{ Request::routeIs('product.index') ? ' active' : '' }}"
                            href="{!! route('industryfaq.index') !!}">
                            Certificates
                        </a>
                    </li> -->
                </ul>
            </li>






        </ul>

        <!-- Menu: bottom ul -->

        <button type="button" class="btn btn-link sidebar-mini-btn text-light"><span class="ms-2"><i
                    class="icofont-bubble-right"></i></span></button>

    </div>
</div>
<!-- sidebar end -->