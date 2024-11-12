<main id="main" class="main min-vh-100">

        <div class="pagetitle">
        <h1>Sale</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('sale') }}">Sale</a></li>
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('sale.create') }}">Create</a></li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Create New Sale</h5>

                <!-- Vertical Form -->
                <form wire:submit.prevent='create' class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="card" class="form-label">Card</label>
                        <select wire:model='card' class="form-select form-select mb-3" >
                            <option selected>&mdash; Select a card &mdash;</option>
                            @foreach ($cardsData as $card)
                                <option value="{{ $card->id }}">{{ $card->name }}</option>
                            @endforeach
                        </select>
                        @error('card') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12">
                        <label for="customerName" class="form-label">Customer Name</label>
                        <input wire:model='customerName' type="text" class="form-control" id="customerName">
                        @error('customerName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12">
                        <label for="amount" class="form-label">Amount</label>
                        <input wire:model='amount' type="number" class="form-control" id="amount">
                        @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="text-center d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form><!-- Vertical Form -->

                </div>
            </div>
        </section>
</main><!-- End #main -->