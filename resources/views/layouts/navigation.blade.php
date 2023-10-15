

<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo mx-auto">
                            <a href="index.html">
                                <img src=" {{ asset('assets/img/alumnilogo.png')}}" alt="Logo" style="width: 130px; height: 130px;">
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                        @role('admin')
                        <li class="sidebar-item {{ Request::is('admin/index') ? 'active' : '' }}">
                            <a href="{{ route('admin.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        
                        @endrole
                        <li class="sidebar-item has-subs ">
                            <a href="{{ route('user.home') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Home</span>
                            </a>
                        </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Alumni</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('user.event') }}">Events</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('user.alumnilist') }}">Alumni List</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('user.donations') }}">Donations</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item has-subs ">
                            <a href="{{ route('user.jobs-offering') }}" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Jobs Offering</span>
                            </a>
                        </li>

                        @role('admin')
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-map-fill"></i>
                                <span>Maps</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('admin.maps') }}">Maps</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Account Request</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('admin.user') }}">Pending Request</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('admin.approved') }}">Approved Request</a>
                                </li>
                            </ul>
                        </li>
                        <!--<li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Roles and Permission</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="{{ route('admin.roles') }}">Roles</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('admin.permission') }}">Permission</a>
                                </li>
                            </ul>
                        </li>-->
                      
                        @endrole
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                <a href="{{ route('user.profile') }}">Profile</a>
                                </li>
                                <li class="submenu-item ">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </li>

                        
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>