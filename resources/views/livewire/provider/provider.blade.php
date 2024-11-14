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
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Header Row with Title and Add Button -->
              <div class="row">
                <h5 class="card-title col-6">Providers List</h5>
                <div class="col-6">
                  <a wire:navigate href="{{ route('provider.create') }}">
                    <button class="btn btn-primary btn-sm float-end mt-3 me-3">
                    <i class="bi bi-globe"> Add</i>
                  </button>
                  </a>
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
                    @if ($loginUser->is_admin)
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
                      @if ($loginUser->is_admin)
                        <td class="d-flex justify-content-between align-items-center">
                          <a wire:navigate href="{{ route('provider.update',$provider->id) }}" class="" style="">
                            <i class="bi bi-pencil-square text-warning"></i>
                          </a>
                          <div wire:click=''style="cursor: pointer">
                            <i class="bi bi-trash text-danger"></i>
                          </div>
                        </td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>

            </div> <!-- End Card Body -->
          </div> <!-- End Card -->
        </div> <!-- End Column -->
      </div> <!-- End Row -->
    </section>

  </main>
</div>
