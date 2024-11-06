<div>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row gap-2">

        <!-- Sales Widget -->
        <div class="col-lg-4 bg-white filter rounded">
          <div class="card-body">
            <h5 class="card-title">Sales</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cart"></i>
              </div>
              <div class="ps-3">
                <h6>145</h6>
                <span class="text-success small pt-1 fw-bold">12%</span> 
                <span class="text-muted small pt-2 ps-1">increase</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Revenue Widget -->
        <div class="col-lg-4 bg-white rounded">
          <div class="card-body">
            <h5 class="card-title">Revenue</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-dollar"></i>
              </div>
              <div class="ps-3">
                <h6>$1450</h6>
                <span class="text-success small pt-1 fw-bold">10%</span> 
                <span class="text-muted small pt-2 ps-1">increase</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Customer Widget -->
        <div class="col-lg-4 bg-white rounded">
          <div class="card-body">
            <h5 class="card-title">Customer</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6>200</h6>
                <span class="text-success small pt-1 fw-bold">8%</span> 
                <span class="text-muted small pt-2 ps-1">increase</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
</div>
