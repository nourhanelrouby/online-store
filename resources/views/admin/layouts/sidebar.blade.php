<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar Start -->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="ti-dashboard"></i>
                            <span style="font-size: larger; font-weight: bold;" class="right-nav-text">Home</span>
                        </a>
                    </li>

                    <!-- Categories -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Categories">
                            <div class="pull-left">
                                <i class="ti-folder"></i>
                                <span style="font-size: larger; font-weight: bold;" class="right-nav-text">Categories</span>
                            </div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Categories" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('admin.categories.index') }}">Categories Operations</a></li>
                        </ul>
                    </li>

                    <!-- Products -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#products">
                            <div class="pull-left">
                                <i class="ti-package"></i>
                                <span style="font-size: larger; font-weight: bold;" class="right-nav-text">Products</span>
                            </div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="products" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('admin.products.index') }}">Products Operations</a></li>
                        </ul>
                    </li>

                    <!-- Users -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left">
                                <i class="ti-id-badge"></i>
                                <span style="font-size: larger; font-weight: bold;" class="right-nav-text">Users</span>
                            </div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('admin.users.index') }}">Users Operations</a></li>
                        </ul>
                    </li>

                    <!-- Orders -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#orders">
                            <div class="pull-left">
                                <i class="ti-shopping-cart"></i>
                                <span style="font-size: larger; font-weight: bold;" class="right-nav-text">Orders</span>
                            </div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="orders" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('admin.orders.index')}}">Orders Operations</a></li>
                        </ul>
                    </li>

                    <!-- Blogs -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#blog">
                            <div class="pull-left">
                                <i class="ti-write"></i>
                                <span style="font-size: larger; font-weight: bold;" class="right-nav-text">Blogs</span>
                            </div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="blog" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('admin.blog.index') }}">Blogs Operations</a></li>
                        </ul>
                    </li>

                    <!-- Subscribes -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subscribes">
                            <div class="pull-left">
                                <i class="ti-bell"></i>
                                <span style="font-size: larger; font-weight: bold;" class="right-nav-text">Subscribes</span>
                            </div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="subscribes" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('admin.subscribes.index') }}">Subscribe Operations</a></li>
                        </ul>
                    </li>
{{--                    contact--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#contact">
                            <div class="pull-left">
                                <i class="ti-email"></i>
                                <span style="font-size: larger; font-weight: bold;" class="right-nav-text">Contacts</span>
                            </div>
                            <div class="pull-right"><i class="ti-angle-down"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="contact" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('admin.contact.index') }}">Contact Operations</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Left Sidebar End -->
    </div>
</div>
