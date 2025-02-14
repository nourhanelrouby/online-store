        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href=""><img width="90" src="{{ asset('assets/site/img/logo1.png') }}" alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="{{'admin.dashboard'}}"><img src="{{asset('assets/Admin/images/logo-icon-dark.png')}}"
                        alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger notification-status"> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        @php($notifications = \Illuminate\Support\Facades\Auth::guard('admin')->user()->notifications)
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            <span class="badge badge-pill badge-warning">{{$notifications->count()}}</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        @foreach($notifications as $notification)
                        <a href="#" class="dropdown-item">{{$notification->data['message']}}<small
                                class="float-right text-muted time">{{$notification->created_at}}</small> </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big">
                        <div class="dropdown-header">
                            <strong>Quick Links</strong>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="nav-grid">
                            <a href="{{route('admin.users.index')}}" class="nav-grid-item"><i class="ti-files text-primary"></i>
                                <h5>New User</h5>
                            </a>
                            <a href="{{route('admin.categories.index')}}" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                                <h5>New Category</h5>
                            </a>
                        </div>
                        <div class="nav-grid">
                            <a href="{{route('admin.products.index')}}" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                                <h5>Add Product</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>
                                <h5>New Orders</h5>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/Admin/images/profile-avatar.jpg') }}" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    @php($Admin= \Illuminate\Support\Facades\Auth::guard('admin')->user())
                                    <h5 class="mt-0 mb-0">{{$Admin->name}}</h5>
                                    <span>{{$Admin->email}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('admin.profile')}}"><i class="text-warning ti-user"></i>Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="text-danger ti-unlock"></i>Logout</a>
                        <form id="logout-form" action="{{route('admin.logout')}}" method="get" style="display: none;">
                             @csrf
                         </form>
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
