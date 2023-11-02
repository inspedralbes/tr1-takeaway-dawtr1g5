<?php

namespace app\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class compraMail extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   */
  public function __construct($ticket, $linea)
  {
    $this->ticket = $ticket;
    $this->linea = $linea;
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
        ->withMime('application/pdf'),
    ];
  }

  public function build()
  {
    return $this->subject('Compra aceptada')
      ->view('mail.mail', [
        'ticket' => $this->ticket,
        'linea' => $this->linea
      ]);
  }
}