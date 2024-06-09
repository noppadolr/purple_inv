<div class="app-menu">
    @php
    $id =\Illuminate\Support\Facades\Auth::user()->id;
    $adminData = \App\Models\User::find($id);
    @endphp
    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="" class="logo-light">
            <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo" class="logo-lg">
            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
        </a>

        <!-- Brand Logo Dark -->
        <a href="" class="logo-dark">
            <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg">
            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="small logo" class="logo-sm">
        </a>
    </div>

    <!-- menu-left -->
    <div class="scrollbar">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ url($adminData->avatar) }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="dropdown-toggle h5 mb-1 d-block" data-bs-toggle="dropdown">{{
                    $adminData->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted mb-0">{{ $adminData->email }}</p>
        </div>

        <!--- Menu -->
        <ul class="menu">

            <li class="menu-title">Navigation</li>

            <li class="menu-item">
                <a href="{{ route('admin.dashboard') }}" class="menu-link">
                    <span class="menu-icon"><i data-feather="airplay"></i></span>
                    <span class="menu-text"> Dashboards </span>
                </a>
            </li>

            <li class="menu-title">Apps</li>

            <li class="menu-item {{ ((Request::is('supplier/*')) ? 'active' : '') }}">
                <a href="#menuSupplier" data-bs-toggle="collapse"
                    class="menu-link {{ ((Request::is('supplier/*')) ? 'show' : '') }}">
                    <span class="menu-icon "><i data-feather="users"></i></span>
                    <span class="menu-text "> Manage Supplier </span>
                    <span class="menu-arrow" @if (Request::is('supplier/*')) style="transform: rotate(90deg);"
                        @endif></span>

                </a>
                <div class="collapse {{ ((Request::is('supplier/*')) ? 'show' : '') }}" id="menuSupplier">
                    <ul class="sub-menu">
                        <li class="menu-item ">
                            <a href="{{ url('supplier/all') }}" class="menu-link ">
                                <span class="menu-text">Supplier All</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('supplier/add') }}" class="menu-link ">
                                <span class="menu-text">Add Supplier</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuCustomer" data-bs-toggle="collapse"
                    class="menu-link {{ ((Request::is('customer/*')) ? 'show' : '') }}">
                    <span class="menu-icon"><i data-feather="users"></i></span>
                    <span class="menu-text {{ ((Request::is('customer/*')) ? 'active' : '') }}"> Manage Customer </span>
                    <span class="menu-arrow" 
                        @if (Request::is('customer/*')) style="transform: rotate(90deg);"
                        @endif>
                    </span>
                </a>
                <div class="collapse {{ ((Request::is('customer/*')) ? 'show' : '') }}" id="menuCustomer">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="{{ url('customer/all') }}" class="menu-link">
                                <span class="menu-text">Customer All</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('customer/create')  }}" class="menu-link">
                                <span class="menu-text">Add Customer</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!--- End Menu -->
        <div class="clearfix"></div>
    </div>
</div>