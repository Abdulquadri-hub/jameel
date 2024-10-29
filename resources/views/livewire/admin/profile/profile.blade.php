      
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
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
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, {{ ucfirst($row->firstname)}}!</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>
            <div m-3>@include('layouts.messages')</div>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="{{ env('ASSETS_URL') }}/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name">{{ ucfirst($row->firstname) }}  {{ ucfirst($row->lastname)}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ ucfirst($row->role)}}</div></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form wire:submit="save"  class="needs-validation">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>First Name</label>
                            <input type="text" class="form-control" wire:model='firstname'>
                            @error('firstname') <span class ="text-danger"> {{ $message }} </span>  @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Last Name</label>
                            <input type="text" class="form-control" wire:model='lastname'>
                            @error('lastname') <span class ="text-danger"> {{ $message }} </span>  @enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" wire:model='email'>
                            @error('email') <span class ="text-danger"> {{ $message }} </span>  @enderror
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>