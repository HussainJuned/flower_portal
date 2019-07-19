<?php

namespace App\Http\Controllers;

use App\BuyerInvoice;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewOI(Request $request , BuyerInvoice $invoice)
    {
        return view('pdf.outstanding_invoice', compact('invoice'));
    }

    public function generateOIpdf(BuyerInvoice $invoice) {

//      view()->share('invoice',$invoice);
        $pdf = PDF::loadView('pdf.outstanding_invoice', compact('invoice'));

        //$pdf->setOption('enable-javascript', true);
       // $pdf->setOption('javascript-delay', 10);
 //        $pdf->setOption('enable-smart-shrinking', true);
        //$pdf->setOption('no-stop-slow-scripts', true);

        return $pdf->download('invoice-'. $invoice->id .'.pdf');
    }
}
