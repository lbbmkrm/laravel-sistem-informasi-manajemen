<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Customer;
use App\Models\Provider;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class DataController extends Controller
{
    public function saleDownload(): Response
    {
        $data = Sale::all();

        $pdf = Pdf::loadView('data.sale-report', compact('data'));

        return $pdf->download('sale-report.pdf');
    }

    public function cardDownload(): Response
    {
        $data = Card::all();

        $pdf = Pdf::loadView('data.card-report', compact('data'));

        return $pdf->download('card-report.pdf');
    }
    public function providerDownload(): Response
    {
        $data = Provider::all();

        $pdf = Pdf::loadView('data.provider-report', compact('data'));

        return $pdf->download('provider-report.pdf');
    }
    public function customerDownload(): Response
    {
        $data = Customer::all();

        $pdf = Pdf::loadView('data.customer-report', compact('data'));

        return $pdf->download('customer-report.pdf');
    }
}
