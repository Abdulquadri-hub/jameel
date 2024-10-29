      <div class="main-content">
        <section class="section">
          <div class="section-header">

            <h1>{{ $title }}</h1>

            <div class="section-header-breadcrumb">
            
              <div class='mr-3'>
                <button wire:click="reload" 
                        class="btn btn-primary position-relative" 
                        wire:loading.class="disabled"
                        wire:loading.attr="disabled">
                    
                    <span wire:loading.remove>
                        <i class="fas fa-sync-alt"></i>
                    </span>
                    
                    <span class="d-inline-flex align-items-center">
                        <span wire:loading class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true">
                          Loading...
                        </span>
                    </span>
                </button>
              </div>

              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}" wire:navigate >Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('roles-and-permissions.index') }}" wire:navigate >{{ $title }}</a></div>
              <div class="breadcrumb-item">All {{ $this->tableTitle }}</div>
            </div>

          </div>

          <div class="section-body">
            <h2 class="section-title">{{ $title }}</h2>
            <p class="section-lead">
              You can manage all roles and permissions, such as editing, deleting and more.
              @include('layouts.messages')
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card mb-0">
                  <div class="card-body">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link {{ $this->activeTable == "roles" ? "active" : "" }}" wire:click='showRoles'>Roles </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ $this->activeTable == "permissions" ? "active" : "" }}" wire:click='showPermissions'>Permissions </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All {{ $this->tableTitle }}</h4>
                    @switch($this->activeTable)
                        @case("roles")
                            <div class="section-header-button">
                              <a href='{{ route("roles-and-permissions.add-role") }}' wire:navigate>
                                <button class="btn btn-primary" id="">Add New</button>
                              </a>
                            </div>
                            @break
                    
                        @case("permissions")
                            <div class="section-header-button">
                              <a href='{{ route("roles-and-permissions.add-permission") }}' wire:navigate>
                                <button class="btn btn-primary" id="">Add New</button>
                              </a>
                            </div>
                            @break
                    
                        @default
                            
                    @endswitch
                  </div>
                  <div class="card-body">
                    <div class="float-right">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-append">                                            
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="clearfix mb-3"></div>

                    @switch($this->activeTable)
                        @case("roles")
                            @include("livewire.admin.roles-and-permissions.roles.roles", $this->roles)
                            @break
                        @case("permissions")
                            @include("livewire.admin.roles-and-permissions.permissions.permissions", $this->permissions)
                            @break
                        @default
                            
                    @endswitch
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>
