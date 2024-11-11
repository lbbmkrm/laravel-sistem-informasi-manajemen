<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Cards</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('customer') }}">Card</a></li>
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
                    <i class="bi bi-sd-card"></i> 
                    Add
                  </button>
                </div>
              </div>
              <h5 class="card-title">Card List</h5>
              <table class="table ">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Provider</th>
                    <th>Stock</th> 
                    <th>Price</th> 
                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cards as $card)
                  <tr>
                    <td>{{ $card->name }}</td>
                    <td>{{ $card->provider->name }}</td>
                    <td>{{ $card->stock }}</td>
                    <td>{{ $card->price }}</td>
                    <td>{{ $card->created_at }}</td>
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