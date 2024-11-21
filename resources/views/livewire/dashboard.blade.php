<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4  {{ auth()->user()->is_admin ? 'col-md-6' : 'col-md-12' }}">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Sales </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $amountSale }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            @if (auth()->user()->is_admin)
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Revenue</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Rp. {{ number_format($totalSale, 0, ',', '.') }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
              @endif
            <!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-6">

              <div class="card info-card customers-card">

               
                <div class="card-body">
                  <h5 class="card-title">Customers</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $customers }}</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            <div class="col-xxl-4 col-xl-6">

              <div class="card info-card customers-card">


                <div class="card-body">
                  <h5 class="card-title">Providers</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon bg-light rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-globe text-info "></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $providers }}</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>
</main><!-- End #main -->