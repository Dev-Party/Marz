<?php

namespace App\Http\Controllers\Account;

use Illuminate\Support\Facades\Auth;
use App\Invoice;
use App\Http\Controllers\Controller;
use PDF;

class InvoicesController extends Controller
{
    public function all()
    {
    	$invoices = Invoice::where('user_id', Auth::user()->id)
                            ->orderBy('id', 'desc')
                            ->get();

        return view('account.invoices.all', ['invoices' => $invoices]);
    }

    public function view($id)
    {
    	$invoice = Invoice::find($id);

    	$pdf = PDF::loadView('emails.billing.shipped', $invoice);

    	return $pdf->stream();
    }
}
