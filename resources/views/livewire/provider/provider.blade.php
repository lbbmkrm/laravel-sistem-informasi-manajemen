<div>
  <main id="main" class="main min-vh-100">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>Providers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active"><a wire:navigate href="{{ route('provider') }}">Providers</a></li>
        </ol>
      </nav>
    </div>

    <!-- Main Section -->
    <section class="section">
      @if (session('error'))
            <div class="alert alert-danger" role="alert">
                <div class="d-flex gap-4">
                    <span><i class="bi bi-exclamation-triangle"></i></span>
                    <div class="d-flex flex-column gap-2">
                        <p class="mb-0">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <div class="d-flex gap-4">
                    <span><i class="bi bi-check-circle"></i></span>
                    <div class="d-flex flex-column gap-2">
                        <p class="mb-0">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Header Row with Title and Add Button -->
              <div class="row">
                <h5 class="card-title col-4">Providers List</h5>
                <div class="col-4 d-flex justify-content-center align-items-center">
                  <a href="{{ route('data.provider') }}">
                    <button type="button" class="btn btn-sm btn-outline-success ">
                      <i class="bi bi-download"></i>
                    </button>
                  </a>
                </div>
                <div class="col-4">
                  <a wire:navigate href="{{ route('provider.create') }}">
                    <button class="btn btn-outline-primary btn-sm float-end mt-3 me-3">
                    <i class="bi bi-cloud-plus-fill"> Add</i>
                  </button>
                  </a>
                </div>
              </div>

              <!-- Form Pencarian -->
              <div class="row mb-3">
                <div class="col-12">
                  <input 
                    class="form-control form-control-sm w-50 mx-auto" 
                    type="text" 
                    wire:model.live="search"
                    placeholder="Search by name...">
                </div>
              </div>

              <!-- Provider Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th>Provider Name</th>
                    <th>Card Count</th>
                    <th>Created Date</th>
                    <th>Card Sales Amount</th>
                    @if (auth()->user()->is_admin)
                      <th>&nbsp;</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($providers as $provider)
                    <tr>
                      <td>{{ $provider->name }}</td>
                      <td>{{ $provider->cards->count() }}</td>
                      <td>{{ $provider->created_at->format('Y-m-d') }}</td>
                      <td>
                        @php
                          $totalSalesAmount = $provider->cards->sum(fn($card) => $card->sales->sum('amount'));
                        @endphp
                        {{ $totalSalesAmount }}
                      </td>
                      @if (auth()->user()->is_admin)
                        <td class="d-flex gap-3">
                          <span wire:navigate wire:click="validateBeforeUpdate({{ $provider->id }})" style="cursor: pointer">
                            <i class="bi bi-pencil-square text-warning"></i>
                          </span>
                          <span wire:click="delete({{ $provider->id }})" style="cursor: pointer">
                            <i class="bi bi-trash text-danger"></i>
                          </span>
                        </td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>

              {{ $providers->links() }}

            </div> <!-- End Card Body -->
          </div> <!-- End Card -->
        </div> <!-- End Column -->
      </div> <!-- End Row -->
    </section>

  </main>
</div>
