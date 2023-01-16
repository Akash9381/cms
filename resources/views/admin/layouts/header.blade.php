<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li> --}}

    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell fa-2x"></i>
                @if (AllNotification()>0)
                <span class="badge badge-warning navbar-badge">{{AllNotification()}}</span>

                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{AllNotification()}} Notifications</span>
                <div class="dropdown-divider"></div>
                @if (TenentCount()>0)
                <a href="{{url('admin/notification?tenant='.TenentCount())}}" class="dropdown-item">
                    {{-- <i class="fas fa-envelope mr-2"></i> --}}
                    <i class="nav-icon fas fa-user-circle"></i><span class="mx-3">
                     {{TenentCount() }} Tenant</span>
                    {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
                </a>
                @endif
                <div class="dropdown-divider"></div>
                @if (BuyerCount()>0)
                <a href="{{url('admin/notification?buyer='.BuyerCount())}}" class="dropdown-item">
                    {{-- <i class="fas fa-envelope mr-2"></i> --}}
                    <i class="nav-icon fas fa-user-circle"></i><span class="mx-3">
                     {{BuyerCount() }} Buyer</span>
                    {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
                </a>
                @endif
                {{-- <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a> --}}
                <div class="dropdown-divider"></div>
                <a href="{{url('admin/notification')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>


    </ul>
</nav>
