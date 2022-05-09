<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $data = Student::find($id);
        
        return view('pages.admin.invoice', compact('data'));
    }

    public function receipt($id)
    {
        $data = Student::find($id);
        
        return view('pages.admin.receipt', compact('data'));
    }

    // Export Excel Invoice
    public function invoiceExcel()
    {
        return Excel::download(new StudentExport, 'invoice.xlsx');
    }
}
