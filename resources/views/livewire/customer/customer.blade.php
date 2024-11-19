<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Customers</h1>
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
                <h5 class="card-title col-4">Customer List</h5>
                <div class="col-4 d-flex justify-content-center align-items-center">
                  <a href="{{ route('data.customer') }}">
                    <button type="button" class="btn btn-sm btn-outline-success ">
                      <i class="bi bi-download"></i>
                    </button>
                  </a>
                </div>
                <div class="col-4">
                  <a wire:navigate href="{{ route('customer.create') }}">
                    <button class="btn btn-outline-primary btn-sm float-end mt-3">
                      <i class="bi bi-person-plus-fill"> New</i>
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
                    @if ($loginUser->is_admin)
                        <th>&nbsp;</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($customers as $customer)
                  <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->created_at }}</td>
                    <td>{{ $customer->address }}</td>
                    <td class="d-flex gap-4 align-items-center">
                      <a wire:navigate href="{{ route('customer.update', $customer->id) }}" class="" style="">
                        <i class="bi bi-pencil-square text-warning"></i>
                      </a>
                      @if ($loginUser->is_admin)
                        <div wire:click='delete({{ $customer->id }})'style="cursor: pointer">
                          <i class="bi bi-trash text-danger"></i>
                        </div>
                      @endif
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