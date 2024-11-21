<main id="main" class="main min-vh-100">

    <div class="pagetitle">
      <h1>Cards</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a wire:navigate href="{{ route('card') }}">Card</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title col-4">Cards List</h5>
                <div class="col-4 d-flex justify-content-center align-items-center">
                  <a href="{{ route('data.card') }}">
                    <button type="button" class="btn btn-sm btn-outline-success ">
                      <i class="bi bi-download"></i>
                    </button>
                  </a>
                </div>
                <div class="col-4">
                  <a wire:navigate href="{{ route('card.create') }}">
                    <button class="btn btn-outline-primary btn-sm float-end mt-3 me-3">
                    <i class="bi bi-plus-circle-fill"> Add</i>
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
                    placeholder="Search by name, provider, stock, or price...">
                </div>
              </div>
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
                    @if (auth()->user()->is_admin)
                        <th>&nbsp;</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cards as $card)
                  <tr>
                    <td>{{ $card->name }}</td>
                    <td>
                    @isset($card->provider)
                      {{ $card->provider->name }}
                    @else
                      <i class="bi bi-file-earmark-x text-danger"></i>
                    @endisset
                    </td>
                    <td>{{ $card->stock }}</td>
                    <td>Rp.{{ number_format($card->price, 0, ',', '.') }}</td>
                    <td>{{ $card->created_at }}</td>
                    @if (auth()->user()->is_admin)
                        <td>
                          <a wire:navigate href="{{ route('card.update', $card->id) }}">
                            <i class="bi bi-pencil-square text-warning"></i>
                          </a>
                          <td wire:click='delete({{ $card->id }})'style="cursor: pointer">
                            <i class="bi bi-trash text-danger"></i>
                          </td>
                        </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $cards->links() }}
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->