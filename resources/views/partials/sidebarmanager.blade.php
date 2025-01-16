<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-text mx-3">{{ __('Manager Page') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ request()->is('manager/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('manager.dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span>{{ __('Room Management') }}</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('manager/categories') || request()->is('manager/categories/*') ? 'active' : '' }}" href="{{ route('manager.categories.index') }}"> <i class="fa fa-cog mr-2"></i> {{ __('Categories') }}</a>
                        <a class="collapse-item {{ request()->is('manager/kamars') || request()->is('manager/kamars/*') ? 'active' : '' }}" href="{{ route('manager.kamars.index') }}"> <i class="fa fa-cog mr-2"></i> {{ __('Rooms') }}</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Booking Management') }}</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('manager/categories') || request()->is('manager/categories/*') ? 'active' : '' }}" href="{{ route('manager.categories.index') }}"> <i class="fa fa-cog mr-2"></i> {{ __('Categories') }}</a>
                        <a class="collapse-item {{ request()->is('manager/kamars') || request()->is('manager/kamars/*') ? 'active' : '' }}" href="{{ route('manager.kamars.index') }}"> <i class="fa fa-cog mr-2"></i> {{ __('Rooms') }}</a>
                    </div>
                </div>
            </li>
        </ul>