<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(\App\Models\Booking $booking)  // Utilise le modèle Booking
    {
        $this->booking = $booking;
    }
    public function build()
    {
        return $this->from('no-reply@example.com')
                    ->subject('Confirmation de votre réservation')
                    ->view('emails.bookingconfirmation')
                    ->with([
                        'propertyName' => $this->booking->property->name,
                        'startDate' => $this->booking->start_date,
                        'endDate' => $this->booking->end_date,
                    ]);
    }
}
