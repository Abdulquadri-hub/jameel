    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{ env('ASSETS_URL') }}/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form wire:submit='save'>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">First Name</label>
                      <input id="frist_name" wire:model.debounce.5ms='firstname' type="text" class="form-control" name="firstname" autofocus>
                      @error('firstname') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" wire:model.debounce.5ms='lastname' type="text" class="form-control" name="lastname">
                      @error('lastname') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-6">
                      <label for="email">Email</label>
                      <input id="email" wire:model.debounce.5ms='email' type="email" class="form-control"   name="email">
                      @error('email') <span class='text-danger'> {{ $message }} </span> @enderror
                      <div class="invalid-feedback">
                      </div>
                    </div>

                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" wire:model.debounce.5ms='password' type="password" class="form-control pwstrength" name="password">
                      @error('password') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>
                  </div>

                  <div class="form-divider">
                    Your Home
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Country</label>
                      <select wire:model.debounce.5ms='country' class="form-control selectric">
                        <option></option>
                        <option value="nigeria">Nigeria</option>
                      </select>
                      @error('country') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>

                    <div class="form-group col-6">
                      <label>State</label>
                      <select wire:model.debounce.5ms='state' class="form-control selectric">
                        <option></option>
                        <option value="lagos">Lagos</option>
                      </select>
                      @error('state') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>City</label>
                      <input wire:model.debounce.5ms='city' type="text" class="form-control">
                      @error('city') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>
                    <div class="form-group col-6">
                      <label>Postal Code</label>
                      <input type="text" wire:model.debounce.5ms='postal_code' class="form-control">
                      @error('postal_code') <span class='text-danger'> {{ $message }} </span> @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input wire:model.debounce.5ms='terms' type="checkbox" name="terms" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Jameel 2024
            </div>
          </div>
        </div>
      </div>
    </section>
