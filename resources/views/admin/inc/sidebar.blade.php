        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ __('SB Admin') }}<sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/employees">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Employee Management') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSystem"
                    aria-expanded="true" aria-controls="collapseSystem">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>{{ __('System Management') }}</span>
                </a>
                <div id="collapseSystem" class="collapse" aria-labelledby="headingSystem" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">{{ __('System Management') }}:</h6>
                        <a class="collapse-item" href="{{ route('countries.index') }}">{{ __('Country') }}</a>
                        <a class="collapse-item" href="{{ route('states.index') }}">{{ __('State') }}</a>
                        <a class="collapse-item" href="{{ route('cities.index') }}">{{ __('City') }}</a>
                        <a class="collapse-item" href="{{ route('departments.index') }}">{{ __('Department') }}</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>{{ __('Users Management') }}</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">{{ __('Users Management') }}:</h6>
                        <a class="collapse-item" href="{{ route('users.index') }}">{{ __('Users') }}</a>
                        <a class="collapse-item" href="{{ route('roles.index') }}">{{ __('Role') }}</a>
                        <a class="collapse-item" href="{{ route('permissions.index') }}">{{ __('Permission') }}</a>
                    </div>
                </div>
            </li>


        </ul>
        <!-- End of Sidebar -->
