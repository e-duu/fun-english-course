<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function downloadInvoice($id)
    {

        $data = Student::find($id);
        
        $pdf = PDF::loadView('pages.admin.invoice-pdf', ['data' => $data]);
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->download('invoice.pdf');
        
    }

    public function downloadReceipt($id)
    {

        $data = Student::find($id);
        
        $pdf = PDF::loadView('pages.admin.receipt-pdf', ['data' => $data]);
        $pdf->setPaper('A4', 'landscape');
        
        return $pdf->download('receipt.pdf');
        
    }
}
