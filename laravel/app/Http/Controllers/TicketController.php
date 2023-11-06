<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\LineaTicket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Mail\compraMail;
use PDF;

class TicketController extends Controller
{
  //MOSTRA TOTS ELS TICKETS EN UN LLISTAT


  public function index_all()
  {
    $ticket = ticket::all();

    return view('tickets.index', ['tickets' => $ticket]);
  }


  public function store(Request $request)
  {
    ///GET POST REQUEST DATA
    $data = $request->all();
    ///STORE TICKET DATA
    $ticket = new Ticket;
    $ticket->final_price = $data["precio"];
    $ticket->user_name = $data['userName'];
    $ticket->user_email = $data['userEmail'];

    //Generate QR code with Ticket ID, status, and price
    $ticket->save();

    $qrData = [
      'Ticket ID' => $ticket->id,
      'Email' => $ticket->user_email,
      'Name' => $ticket->user_name,
      'Price' => $ticket->final_price,
    ];
    $jsonQrCode = json_encode($qrData);
    $qrCode = QrCode::size(300)->generate($jsonQrCode);

    $qrCodeFileName = 'ticket_' . $ticket->id . '_qr.svg';

    try {
      Storage::disk('qr')->put('/' . $qrCodeFileName, $qrCode);

      $imagePath = 'qrcodes/' . $qrCodeFileName;
      $ticket->qr = $imagePath;
      $ticket->save();
    } catch (\Exception $e) {
      \Log::error('Error al almacenar el código QR: ' . $e->getMessage());
      return response()->json(['error' => 'Error al almacenar el código QR'], 500);
    }

    ///STORE TICKET_LINE DATA
    $compras = $data['compra'];
    foreach ($compras as $compraData) {
      $linea = new LineaTicket;
      $linea->product_name = $compraData['name'];
      $linea->product_artist = $compraData['artist'];
      $linea->product_year_release = $compraData['year'];
      $linea->price = $compraData['price'];
      $linea->quantity = $compraData['count'];
      $linea->product_genre = $compraData['genre_name'];
      $linea->ticket_id = $ticket->id;
      $linea->save();
    }

    $lineas = DB::table('linea_tickets')
      ->where('ticket_id', $ticket->id)
      ->get();

    $pdf = PDF::loadView('pdf.ticket', compact('ticket', 'lineas'));

    $pdffilename = 'ticket_' . $ticket->id . '.pdf';


    try {
      Storage::disk('pdf')->put($pdffilename, $pdf->output());
      $pdfPath = 'pdf/' . $pdffilename;
      $ticket->pdf = $pdfPath;
      $ticket->save();
    } catch (\Exception $e) {
      \Log::error('Error al almacenar el código QR: ' . $e->getMessage());
      return response()->json(['error' => 'Error al almacenar el código QR'], 500);
    }

    Mail::to($ticket->user_email)->send(new compraMail($ticket, $linea));


    return response()->json(['mensaje' => 'Ticket guardado correctamente']);
  }

  public function showOne_Ticket($id)
  {
    $ticket = DB::table('tickets')
      ->join('linea_tickets', 'linea_tickets.ticket_id', '=', 'tickets.id')
      ->select('tickets.*', 'linea_tickets.*')
      ->where('tickets.id', '=', $id)
      ->get();

    return response()->json($ticket);
  }


  public function getLastTicket()
  {
    $ticket = DB::table('tickets')
      ->join('linea_tickets', 'linea_tickets.ticket_id', '=', 'tickets.id')
      ->select('tickets.*', 'linea_tickets.*')
      ->latest('tickets.id')
      ->first();

    return response()->json($ticket);
  }

  public function show($id)
  {
    $ticket = DB::table('tickets')
      ->join('linea_tickets', 'linea_tickets.ticket_id', '=', 'tickets.id')
      ->select('tickets.*', 'linea_tickets.*')
      ->where('tickets.id', '=', $id)
      ->get();
    $linea_ticket = LineaTicket::all();

    return view('tickets.show', ['tickets' => $ticket, 'linea_ticket' => $linea_ticket]);
  }
  public function update(Request $request, $id)
  {

    $ticket = ticket::find($id);
    $ticket->estat = $request->estat;

    $ticket->save();

    return redirect()->route('tickets')->with('success', 'Ticket actualitzat correctament!');
  }

  public function destroy($id)
  {
    $ticket = ticket::find($id);
    $ticket->delete();

    return redirect()->route('tickets')->with('success', 'El Ticket ha sigut eliminat correctament!');
  }
}
