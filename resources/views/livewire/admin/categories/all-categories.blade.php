      <div class="main-content">
        <section class="section">
          <div class="section-header">

            <h1>{{ $title }}</h1>
            <div class="section-header-button">
              <a href="{{ route('categories.add') }}" wire:navigate  class="btn btn-primary">Add New</a>
            </div>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}" wire:navigate >Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('categories.index') }}" wire:navigate >{{ $title }}</a></div>
              <div class="breadcrumb-item">All {{ $title }}</div>
            </div>

          </div>

          <div class="section-body">
            <h2 class="section-title">{{ $title }}</h2>
            <p class="section-lead">
              You can manage all categories, such as editing, deleting and more.
              @include('layouts.messages')
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card mb-0">
                  <div class="card-body">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Active <span class="badge badge-primary">1</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">In-Active <span class="badge badge-primary">1</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
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
                    <h4>All {{ $title }}</h4>
                  </div>
                  <div class="card-body">

                    <div class="float-left">
                      <select class="form-control selectric">
                        <option>Action For Selected</option>
                        <option>Set to Active</option>
                        <option>Set to In-Active</option>
                        <option>Delete Pemanently</option>
                      </select>
                    </div>

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

                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th class="text-center pt-2">
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>Name</th>
                          <th>Created By</th>
                          <th>Created At</th>
                          <th>Status</th>
                        </tr>

                        @isset($categories)
                          
                          @forelse ($categories as $category)
                          
                            <tr>
                              <td>
                                <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                                <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>

                              <td>
                                {{ ucfirst($category->category) }}
                                <div class="table-links">
                                  <a href="#">View</a>
                                  <div class="bullet"></div>
                                  <a href="#">Edit</a>
                                  <div class="bullet"></div>
                                  <a href="#" class="text-danger">Trash</a>
                                </div>
                              </td>

                              <td>
                                <a href="#">
                                  <img alt="image" src="{{ env('ASSETS_URL') }}/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title">   
                                  <div class="d-inline-block ml-1">{{ ucfirst($category->user_id) }}</div>
                                </a>
                              </td>
                              <td>{{ ucfirst($category->created_at) }}</td>
                              @if($category->category_status == "active")
                                  
                                <td><div class="badge badge-primary">Active</div></td>

                              @elseif($category->category_status == "inactive")

                                <td><div class="badge badge-danger">In-Active</div></td>

                              @endif
                            </tr>
                            
                          @empty
                            <center class='mt-3'>
                                <p class="bg-info text-center text-white"> No category found at this time </p>
                            </center>
                          @endforelse
                          
                        @endisset
                      </table>
                    </div>
                    
                    <div class="float-right">
                    @isset($categories)
                      {{ $categories->links('vendor.livewire.custom-pagination') }}
                    @endisset
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>
