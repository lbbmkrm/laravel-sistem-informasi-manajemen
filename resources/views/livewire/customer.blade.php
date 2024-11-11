<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Customer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('customer') }}">Customer</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title col-6">Customer List</h5>
                <div class="col-6">
                  <a href="{{ route('customer.create') }}">
                    <button wire:click='create' class="btn btn-primary btn-sm float-end mt-3">
                      <i class="bi bi-person-plus"></i> 
                      New
                    </button>
                  </a>
                </div>
              </div>
              <table class="table ">
                <thead>
                  <tr>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Phone</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($customers as $customer)
                  <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->created_at }}</td>
                    <td>{{ $customer->address }}</td>
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