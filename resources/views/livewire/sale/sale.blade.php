<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Cards</h1>
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
                <h5 class="card-title col-6">Sales List</h5>
                <div class="col-6">
                  <a wire:navigate href="{{ route('sale.create') }}">
                    <button class="btn btn-primary btn-sm float-end mt-3 me-3">
                      <i class="bi bi-clipboard2-data"> Create</i>
                    </button>
                  </a>
                </div>
              </div>
              <table class="table ">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Card Name</th>
                    <th>Amount</th> 
                    <th>Total</th>
                    <th>Customer Name</th>
                    <th>Operator</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sales as $sale)
                  <tr>
                    <td>{{ $sale->created_at }}</td>
                    <td>{{ $sale->card->name }}</td>
                    <td>{{ $sale->amount }}</td>
                    <td>Rp. {{ $sale->total }}</td>
                    <td>
                      @isset($sale->customer)
                        {{ $sale->customer->name }}
                      @else
                        <i class="bi bi-person-x text-danger"></i>
                      @endisset
                    </td>
                    <td>
                      @isset($sale->user)
                        {{ $sale->user->name }}
                      @else
                        <i class="bi bi-person-x text-danger"></i>
                      @endisset
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->