<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Cards</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('customer') }}">Card</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title col-6">Account List</h5>
                <div class="col-6">
                  <button wire:click='create' class="btn btn-primary btn-sm float-end mt-3 me-3">
                    <i class="bi bi-clipboard2-data"></i> 
                    Create
                  </button>
                </div>
              </div>
              <h5 class="card-title">Card List</h5>
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
                    <td>{{ $sale->total }}</td>
                    <td>{{ $sale->customer->name }}</td>
                    <td>{{ $sale->user->name }}</td>
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