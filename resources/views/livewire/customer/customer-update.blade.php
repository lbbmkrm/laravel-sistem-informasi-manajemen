<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Customer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('customer') }}">Customer</a></li>
          <li class="breadcrumb-item">Update</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update {{ $customer->name }}</h5>

              <!-- Vertical Form -->
              <form wire:submit.prevent='update' class="row g-3">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Name</label>
                  <input wire:model='name' type="text" class="form-control" id="inputNanme4">
                  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                  <label for="phone" class="form-label">Phone</label>
                  <input wire:model='phone' type="text" class="form-control" id="phone">
                  @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea wire:model="address" class="form-control" placeholder="Customer Address..." id="address" style="height: 100px;"></textarea>
                    @error('address')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-center d-grid">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
    </section>
</main><!-- End #main -->