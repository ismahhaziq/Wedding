<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Dompdf\Dompdf;
use Dompdf\Options;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $invoice;
    protected $eventDate;

    public function __construct(Invoice $invoice, $eventDate)
    {
        $this->invoice = $invoice;
        $this->eventDate = $eventDate;
    }

    public function build()
    {
        // Generate PDF content
        $pdf = $this->generatePDF();

        return $this->view('emails.invoice')
            ->with(['invoice' => $this->invoice, 'eventDate' => $this->eventDate])
            ->attachData($pdf, 'invoice.pdf', [
                'mime' => 'application/pdf',
            ]);
    }

    protected function generatePDF()
    {
        // Create a new instance of Dompdf
        $dompdf = new Dompdf();

        // Load HTML content from the Blade view
        $html = view('emails.invoice', ['invoice' => $this->invoice, 'eventDate' => $this->eventDate])->render();

        // Load HTML into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Return the PDF content
        return $dompdf->output();
    }
}
