<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

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

    public function invoiceToMail()
    {
        $data = Student::findOrFail(5);

        $dataEmail["email"] = $data->student->email;
        $dataEmail["title"] = "From Fun English Course";
        $dataEmail["body"] = "This is Demo";

        $pdf = PDF::loadView('pages.admin.invoice-pdf', ['data' => $data]);

        Mail::send('pages.emails.email', $dataEmail, function($message)use($dataEmail, $pdf) {
            $message->to($dataEmail["email"], $dataEmail["email"])
                    ->subject($dataEmail["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });

        dd('Mail sent successfully');
    }
}
