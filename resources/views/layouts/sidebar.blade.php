
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">{{ env('APP_NAME') }} </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li class="dropdown active">
              <a href="{{ route('admin.dashboard') }}" wire:navigate class="nav-link"><i class="fas fa-fire"></i><span>Home</span></a>
            </li>

            {{-- brands --}}
            <li class="dropdown">
              <a href="{{ route('brand.index') }}" wire:navigate  class="nav-link"><i class="far fa-user"></i> <span>Brands</span></a>
            </li>

            {{-- categories --}}
            <li class="dropdown">
              <a href="{{ route('categories.index') }}" wire:navigate class="nav-link"><i class="far fa-user"></i> <span>Categories</span></a>
            </li>

            <li class="dropdown">
              <a href="{{ route('product.index') }}" wire:navigate class="nav-link"><i class="far fa-user"></i> <span>Products</span></a>
            </li>

            <li class="dropdown">
              <a href="#" wire:navigate class="nav-link"><i class="far fa-user"></i> <span>Roles And Permissions</span></a>
            </li>

            <li class="menu-header">User</li>

              <li class="dropdown">
                <a  href="{{ route('admin.profile') }}" wire:navigate  class="nav-link"><i class="far fa-user"></i> <span>Profile</span></a>
              </li>

            <li class="menu-header">Auth</li>

            @if (checkLogin())
              @livewire("auth.logout")
            @else
              <li class="dropdown">
                <a href="{{ route('register') }}" wire:navigate  class="nav-link"><i class="far fa-user"></i> <span>Register</span></a>
              </li>

              <li class="dropdown">
                <a href="{{ route('login') }}" wire:navigate  class="nav-link"><i class="far fa-user"></i> <span>Login</span></a>
              </li>
            @endif
            
          </ul>       
          </aside>
        </div>