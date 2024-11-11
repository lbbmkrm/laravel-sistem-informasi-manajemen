<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
          <li class="breadcrumb-item"><a href="{{ route('profile.create') }}">Create</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create New User</h5>

              <!-- Vertical Form -->
              <form wire:submit.prevent='create' class="row g-3">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Name</label>
                  <input wire:model='name' type="text" class="form-control" id="inputNanme4">
                  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input wire:model='email' type="email" class="form-control" id="inputEmail4">
                  @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input wire:model='password' type="password" class="form-control" id="inputPassword4">
                  @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                    <select wire:model='role' class="form-select form-select-lg mb-3" >
                        <option selected>Role</option>
                        <option value="admin">Admin</option>
                        <option value="member">Member</option>
                    </select>
                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="text-center d-grid">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
    </section>
</main><!-- End #main -->