<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{url('admin/dashboard')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/logo.png')}}" alt="ADDRESS MAKERS" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">ADDRESS MAKERS</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{url('admin/dashboard')}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link {{setActiveClass('admin/dashboard')}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dasboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/buyer')}}" class="nav-link {{setActiveClass('admin/buyer')}}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Buyer
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/seller')}}" class="nav-link {{setActiveClass('admin/seller')}}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Seller
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{url('admin/tenant')}}" class="nav-link {{setActiveClass('admin/tenant')}}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Tenant
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/landloard')}}" class="nav-link {{setActiveClass('admin/landloard')}}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Land loard
                        </p>
                    </a>
                </li>


                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            List
                        </p>
                    </a>
                </li> --}}

                @hasrole('admin')
                <li class="nav-item">
                    <a href="{{url('admin/employee')}}" class="nav-link {{setActiveClass('admin/employee')}}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Employee
                        </p>
                    </a>
                </li>
                @endhasrole
                <li class="nav-item">
                    <a href="{{url('admin/notification')}}" class="nav-link {{setActiveClass('admin/notification')}}">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Notification <span class="badge badge-warning">@if (AllNotification()>0){{AllNotification()}} @endif</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-lock-open"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>
