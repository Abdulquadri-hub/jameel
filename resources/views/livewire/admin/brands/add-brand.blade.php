      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{ route('brand.index') }}" wire:navigate  class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New {{ $title }}</h1>
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
              <div class="breadcrumb-item"><a href="{{ route('brand.index') }}" wire:navigate >Brands</a></div>
              <div class="breadcrumb-item">Create New {{ $title }}</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Create New {{ $title }}</h2>
            <p class="section-lead">
              On this page you can create a new brand and fill in all fields.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    {{-- <h4>Write Your Post</h4> --}}
                  </div>
                  <div class="card-body">

                    <form wire:submit="save">

                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" wire:model.live.debounce.5ms='brand' name='brand' class="form-control">
                        @error('brand') <span class ="text-danger"> {{ $message }} </span>  @enderror
                      </div>
                      </div>


                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" wire:model.debounce.5ms='brand_slug' class="form-control" readonly name='brand_slug'>
                        @error('brand_slug') <span class ="text-danger"> {{ $message }} </span>  @enderror
                      </div>
                      </div>

                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" wire:model.debounce.5ms='brand_status' name='brand_status'>
                          <option></option>
                          <option value='active'>active</option>
                          <option value='inactive'>inactive</option>
                        </select>
                        @error('brand_status') <span class ="text-danger"> {{ $message }} </span>  @enderror
                      </div>
                      </div>

                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7" >
                        <button type="submit" class="btn btn-primary">
                            Create Brand
                        </button>
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