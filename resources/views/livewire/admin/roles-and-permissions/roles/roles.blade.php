<div class="table-responsive">
  <table class="table table-striped">
    <tr>
      <th class="text-center pt-2">
        <div class="custom-checkbox custom-checkbox-table custom-control">
           #
        </div>
      </th>
      <th>Role</th>
      <th>Permissions</th>
      <th>Created At</th>
      <th>Status</th>
    </tr>

    @isset($roles)            
      @forelse ($roles as $key => $role)
                          
        <tr>
          <td>
            <div class="custom-checkbox custom-control">
               {{ $key + 1 }}
            </div>
          </td>

          <td>
            {{ ucfirst($role->name) }}
            <div class="table-links">
              <div class="bullet"></div>
              <a href="{{ route('roles-and-permissions.edit-role', [$role->id]) }}" wire:navigate >Edit</a>
              <div class="bullet"></div>
              <a href="#" wire:click.prevent='trash({{ $role->id }})' class="text-danger">Trash</a>
              <div class="bullet"></div>
              <a href="{{ route('roles-and-permissions.assign-permissions', [$role->id]) }}" wire:navigate class='text-primary'>Assign Permissions</a>
            </div>
          </td>
          @if (isset($role->permissions) && count($role->permissions) > 0)
            <td>
              @foreach ($role->permissions as $permission)
                <div class="badge badge-success">{{ ucfirst($permission->name) }}</div> 
              @endforeach
            </td>  
          @else
            <td>
              <div class="badge badge-danger">No Permsissions</div> 
            </td>
          @endif
          
          <td>{{ ucfirst($role->created_at) }}</td>
          <td><div class="badge badge-primary">Active</div></td>
        </tr>
                            
      @empty
        <center class='mt-3'>
            <p class="bg-info text-center text-white"> No roles found at this time </p>
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
