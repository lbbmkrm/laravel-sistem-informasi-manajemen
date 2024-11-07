<div>
    <main id="main" class="main min-vh-100">
        <div class="pagetitle">
            <h1>Providers</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Providers</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Provider List</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Provider Name</th>
                                        <th>Card Count</th>
                                        <th>Created Date</th>
                                        <th>Card Sales Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($providers as $provider)
                                        <tr>
                                            <td>{{ $provider->name }}</td>
                                            <td>{{ $provider->cards->count() }}</td>
                                            <td>{{ $provider->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                @foreach ($provider->cards as $card)
                                                    <div>{{ $card->name }}</div>
                                                    <div>
                                                        @php
                                                            $totalSalesAmount = $card->sales->sum('amount');
                                                        @endphp
                                                        Total Sales Amount: {{ $totalSalesAmount }}
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
