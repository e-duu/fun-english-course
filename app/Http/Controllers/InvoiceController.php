<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    public function invoice()
    {
        return view('pages.admin.invoice');
    }

    public function receipt()
    {
        return view('pages.admin.receipt');
    }

    // Export Excel Invoice
    public function invoiceExcel()
    {
        return Excel::download(new StudentExport, 'invoice.xlsx');
    }
}
