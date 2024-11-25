<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Sales</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('sale') }}">Sale</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title col-4">Sales List</h5>

                <div class="col-4 d-flex justify-content-center align-items-center">
                  <a href="{{ route('data.sale') }}">
                    <button type="button" class="btn btn-sm btn-outline-success">
                      <i class="bi bi-download"></i>
                    </button>
                  </a>
                </div>

                <div class="col-4">
                  <a wire:navigate href="{{ route('sale.create') }}">
                    <button class="btn btn-outline-primary btn-sm float-end mt-3 me-3">
                      <i class="bi bi-clipboard2-plus-fill"> Create</i>
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
                    placeholder="Search by customer, user, card, or total...">
                </div>
              </div>

              <!-- Tabel Penjualan -->
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Operator</th>
                    <th>Card Name</th>
                    <th>Amount</th>
                    <th>Total</th>
                    <th>Customer</th>
                    <th>Date</th>
                    @if (auth()->user()->is_admin)
                      <th>&nbsp;</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sales as $sale)
                    <tr>
                      <td>{{ $sale->id }}</td>
                      <td>
                        @isset($sale->user)
                          {{ $sale->user->name }}
                        @else
                          <i class="bi bi-person-x text-danger"></i>
                        @endisset
                      </td>
                      <td>
                        @isset($sale->card)
                          {{ $sale->card->name }}
                        @else
                          <i class="bi bi-sim-slash text-danger"></i>
                        @endisset
                      </td>
                      <td>{{ $sale->amount }}</td>
                      <td>Rp. {{ number_format($sale->total, 0, ',', '.') }}</td>
                      <td>
                        @isset($sale->customer)
                          {{ $sale->customer->name }}
                        @else
                          <i class="bi bi-person-x text-danger"></i>
                        @endisset
                      </td>
                      <td>{{ $sale->created_at }}</td>
                      @if (auth()->user()->is_admin)
                        <td class="d-flex gap-3">
                          <span wire:navigate wire:click="validateBeforeUpdate({{ $sale->id }})" style="cursor: pointer">
                            <i class="bi bi-pencil-square text-warning"></i>
                          </span>
                          <span wire:click="delete({{ $sale->id }})" style="cursor: pointer">
                            <i class="bi bi-trash text-danger"></i>
                          </span>
                        </td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div>{{ $sales->links() }}</div>
              <!-- End Table -->

            </div>
          </div>
        </div>
      </div>
    </section>

</main><!-- End #main -->
