<main id="main" class="main min-vh-100">

        <div class="pagetitle">
        <h1>Card</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('card') }}">Card</a></li>
            <li class="breadcrumb-item"><a wire:navigate href="{{ route('card.create') }}">Create</a></li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Add New Card</h5>

                <!-- Vertical Form -->
                <form wire:submit.prevent='create' class="row g-3">
                    @csrf
                    <div class="col-12">
                    <label for="inputNanme4" class="form-label">Name</label>
                    <input wire:model='name' type="text" class="form-control" id="inputNanme4" autocomplete="off">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12">
                        <label for="provider" class="form-label">Provider</label>
                        <select wire:model='provider' class="form-select form-select mb-3" >
                            <option selected>&mdash; Select a provider &mdash;</option>
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12">
                    <label for="stock" class="form-label">Stock</label>
                    <input wire:model='stock' type="number" class="form-control" id="stock">
                    @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12">
                    <label for="price" class="form-label">Price</label>
                    <input wire:model='price' type="number" class="form-control" id="price">
                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="text-center d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form><!-- Vertical Form -->

                </div>
            </div>
        </section>
</main><!-- End #main -->