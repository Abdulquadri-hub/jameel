<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('roles-and-permissions.index') }}" wire:navigate class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit {{ $title }}</h1>
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
                <div class="breadcrumb-item"><a href="{{ route('roles-and-permissions.index') }}" wire:navigate>Roles & Permissions</a></div>
                <div class="breadcrumb-item">Edit {{ $title }}</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit {{ $title }}</h2>
            <p class="section-lead">
                On this page, you can edit the selected role and update its details.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h4>Edit Role</h4> --}}
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="update">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" wire:model='role' class="form-control" value="{{ $role}}">
                                        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Update Role</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
