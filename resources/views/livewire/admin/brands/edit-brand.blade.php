      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{ route('brand.index') }}" wire:navigate  class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit {{ $title }}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('brand.index') }}" wire:navigate >Brands</a></div>
              <div class="breadcrumb-item">Edit {{ $title }}</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Edit {{ $title }}</h2>
            <p class="section-lead">
              On this page you can edit a brand and fill in all fields.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    {{-- <h4>Write Your Post</h4> --}}
                  </div>
                  <div class="card-body">
                  @if(!empty($single_brand))

                    <form wire:submit="save">

                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" wire:model.debounce.5ms='brand' class="form-control">
                        @error('brand') <span class ="text-danger"> {{ $message }} </span>  @enderror
                      </div>
                      </div>

                      {{-- <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" wire:model.debounce.5ms='brand_slug' class="form-control" readonly name='brand_slug'>
                        @error('brand_slug') <span class ="text-danger"> {{ $message }} </span>  @enderror
                      </div>
                      </div> --}}

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
                            Save
                        </button>
                      </div>
                      </div>
                    </form>

                  @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>