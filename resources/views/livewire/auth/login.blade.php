<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">AzkaPonsel</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email &amp; password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" wire:submit.prevent='login' autocomplete="off">
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      @error('email') <span class=" text-danger">{{ $message }}</span> @enderror
                      <div class="input-group has-validation">
                        <input wire:model='email' type="email" name="email" class="form-control" id="email" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      @error('password') <span class=" text-danger">{{ $message }}</span> @enderror
                      <input wire:model='password' type="password" name="password" class="form-control" id="yourPassword" required>
                    </div>

                    <div class="col-12">
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->