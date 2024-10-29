      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{ route('product.index') }}" wire:navigate  class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
              <div class="breadcrumb-item"><a href="{{ route('product.index') }}" wire:navigate >products</a></div>
              <div class="breadcrumb-item">Create New {{ $title }}</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Edit {{ $title }}</h2>
            <p class="section-lead">
              On this page you can edit an existing product.
            </p>

            <div class="row">
              <div class="col-12">
            <div class="card card-primary">

              <div class="card-body">
                <form wire:submit='save'>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="product">Product</label>
                      <input id="product" wire:model='product' type="text" class="form-control" name="product" autofocus>
                      @error('product') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>

                    <div class="form-group col-6">
                      <label for="product_status">Status</label>
                        <select class="form-control selectric" wire:model='product_status' name='product_status'>
                            <option></option>
                            <option value='active'>Active</option>
                            <option value='inactive'>inactive</option>
                        </select>
                        @error('product_status') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>

                    {{-- <div class="form-group col-6">
                      <label for="product_slug">Product Slug</label>
                      <input id="product_slug" wire:model='product_slug' type="text" class="form-control" name="product_slug">
                      @error('product_slug') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div> --}}

                  </div>

                  <div class="row">
                    <div class="form-group col-4">

                        <label for="Categories">Categories</label>
                        <select class="form-control selectric" wire:model='category_id' name='category_id'>
                          <option value='{{  $single_product?->category->id }}'>{{ $single_product?->category->category }}</option>
                          @forelse ($categories as $category)
                            <option value='{{  $category->id }}'>{{  $category->category }}</option>
                          @empty
                            <option value=''></option>
                          @endforelse
                        </select>
                        @error('category') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>

                    <div class="form-group col-4">
                        <label for="Brands">Brands</label>
                        <select class="form-control selectric" wire:model='brand_id' name='brand_id'>
                          <option value='{{  $single_product?->brand->id }}'>{{  $single_product?->brand->brand }}</option>
                          @forelse ($brands as $brand)
                            <option value='{{  $brand->id }}'>{{  $brand->brand }}</option>
                          @empty
                            <option value=''></option>
                          @endforelse
                        </select>
                        @error('brand') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>

                    <div class="form-group col-4">
                        <label for="Warehouse">Warehouses</label>
                        <select class="form-control selectric" wire:model='warehouse_id' name='warehouse_id'>
                          <option value='{{  $single_product?->warehouse?->id }}'>{{  $single_product?->warehouse?->warehouse }}</option>
                          @forelse ($warehouses as $warehouse)
                            <option value='{{  $warehouse->id }}'>{{  $warehouse->warehouse }}</option>
                          @empty
                            <option value=''></option>
                          @endforelse
                        </select>
                        @error('warehouse') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="description">Description</label>
                      <input id="description" wire:model='description' type="text" class="form-control" name="description">
                      @error('description') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>

                    <div class="form-group col-6">
                      <label for="quantity">Quantity</label>
                      <input id="quantity" wire:model='quantity' type="number" class="form-control" name="quantity">
                      @error('quantity') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="price">Price</label>
                      <input id="price" wire:model='price' type="number" step="0.01" class="form-control" name="price">
                      @error('price') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>

                    <div class="form-group col-6">
                      <label for="sku">Sku</label>
                      <input id="sku" wire:model='sku' type="number" class="form-control" name="sku">
                      @error('sku') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <div class="custom-control custom-checkbox">
                      @if ($single_product?->returnable == true)
                        <input wire:mode='returnable' checked type="checkbox" name="returnable" class="custom-control-input" id="agree">
                        <label class="custom-control-label" for="agree">Returnable</label>
                      @else
                        <input wire:mode='returnable' checked type="checkbox" name="returnable" class="custom-control-input" id="agree">
                        <label class="custom-control-label" for="agree">Returnable</label>
                      @endif

                      </div>
                      @error('returnable') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>

                  </div>

                  <div class="form-divider">
                    Images
                  </div>

                  <div class="row">

                    <div class="form-group col-4">
                      <label>Image 1</label>
                      <input id="image1" wire:model='image1'  type="file" class="form-control" name="image1">
                      @error('image1') <span class='text-danger'> {{ $message }} </span> @enderror

                      <div class="card card-primary mt-2">
                        <div class="card-body">
                        @if ($image1Preview)
                          <img src="{{ $image1Preview }}" alt="" style="max-width:200px;">
                        @else
                        @php
                          $img1 = $single_product?->image1;
                        @endphp
                          <img src="{{ $img1 }}" alt="" style="max-width:200px;">
                        @endif
                        </div>
                      </div>

                    </div>

                    <div class="form-group col-4">
                      <label>Image 2</label>
                      <input id="image2" wire:model='image2'  type="file" class="form-control" name="image2">
                      @error('image2') <span class='text-danger'> {{ $message }} </span> @enderror

                      <div class="card card-primary mt-2">
                        <div class="card-body">
                            @if ($image2Preview)
                                <img src="{{ $image2Preview }}" alt="" style="max-width:200px;">
                            @endif
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-4">
                      <label>Image 3</label>
                      <input id="image3" wire:model='image3'  type="file" class="form-control" name="image3">
                      @error('image3') <span class='text-danger'> {{ $message }} </span> @enderror

                      <div class="card card-primary mt-2">
                        <div class="card-body">
                            @if ($image3Preview)
                                <img src="{{ $image3Preview }}" alt="" style="max-width:200px;">
                            @endif
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Save Product
                    </button>
                  </div>
                </form>
              </div>
            </div>

              </div>
            </div>
          </div>
        </section>
      </div>