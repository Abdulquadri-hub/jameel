             <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th class="text-center pt-2">
                             #
                          </th>
                          <th>Permission</th>
                          <th>Created At</th>
                          <th>Status</th>
                        </tr>

                        @isset($permissions)
                          
                          @forelse ($permissions as $key => $permission)
                          
                            <tr>
                              <td>
                                <div class="custom-checkbox custom-control">
                                  {{ $key + 1 }}
                                </div>
                              </td>

                              <td>
                                {{ ucfirst($permission->name) }}
                                <div class="table-links">
                                  <div class="bullet"></div>
                                  <a href="{{ route('roles-and-permissions.edit-permission', [$permission->id]) }}" wire:navigate >Edit</a>
                                  <div class="bullet"></div>
                                  <a href="#" wire:click.prevent='trash({{ $permission->id }})' class="text-danger">Trash</a>
                                </div>
                              </td>
                              <td>{{ ucfirst($permission->created_at) }}</td>
                              <td><div class="badge badge-primary">Active</div></td>
                            </tr>
                            
                          @empty
                            <center class='mt-3'>
                                <p class="bg-info text-center text-white"> No permissions found at this time </p>
                            </center>
                          @endforelse
                          
                        @endisset
                      </table>
                    </div>