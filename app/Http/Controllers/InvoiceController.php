<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Exports\StudentTemplate;
use App\Imports\StudentImport;
use App\Models\Level;
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

    // Export Template Invoice
    public function invoiceExcelTemplate()
    {
        $date = date('d-m-Y');

        return Excel::download(new StudentTemplate, 'template-student-'.$date.'.xlsx');
    }

    // Export Excel Invoice
    public function invoiceExcelExport($id)
    {
        $date = time();

        $level = Level::findOrFail($id);

        return Excel::download(new StudentExport($id), $level->name.'-'.$date.'.xlsx');
    }

    // Import Excel Invoice
    public function invoiceExcelImport(Request $request, $id)
    {
        $file = $request->file('file');

        Excel::import(new StudentImport($id), $file);

        return back();
    }
}
