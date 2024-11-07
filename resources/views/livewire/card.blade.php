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