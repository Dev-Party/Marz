<?php

namespace App\Http\Controllers\Account;

use PDF;
use App\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{
    public function all()
    {
        $invoices = Invoice::where('user_id', Auth::user()->id)
                           ->orderBy('id', 'desc')
                           ->get();

        return view('account.invoices.all', ['invoices' => $invoices]);
    }

    /**
     * Mostrar la factura en PDF.
     */
    public function pdf($id)
    {
        $invoice = Invoice::find($id);

        $pdf = PDF::loadView('emails.billing.shipped', $invoice);

        return $pdf->stream();
    }
}
