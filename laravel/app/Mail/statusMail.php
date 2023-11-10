<?php

namespace app\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class statusMail extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   */
  public function __construct($ticket)
  {
    $this->ticket = $ticket;
  }

  /**
   * Get the attachments for the message.
   *
   * @return array<int, \Illuminate\Mail\Mailables\Attachment>
   */
  public function attachments(): array
  {
    return [
      Attachment::fromPath(public_path($this->ticket->pdf))
        ->as('ticket.pdf')
    ];
  }

  public function build()
  {
    return $this->subject('Canvi estat comanda')
      ->view('mail.status', [
        'ticket' => $this->ticket
      ]);
  }
}