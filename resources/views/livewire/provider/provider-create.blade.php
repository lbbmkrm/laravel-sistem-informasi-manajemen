<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Provider</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('provider') }}">Provider</a></li>
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('provider.create') }}">Create</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Provider</h5>

              <!-- Vertical Form -->
              <form wire:submit='create' class="row g-3">
                @csrf
                <div class="col-12">
                  <input wire:model='name' class="form-control form-control-lg" type="text" 
                  placeholder="Provider's name..." autocomplete="off">
                </div>
                <div class="text-center d-grid">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
    </section>
</main><!-- End #main -->