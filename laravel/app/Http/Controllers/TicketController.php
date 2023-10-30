<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\LineaTicket;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Mail\EnviarCodigoQR;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    //
    public function index_all()
    {
        $ticket = ticket::all();

        return response()->json($ticket);
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
        $ticket->save();

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
            $linea->product_type = $compraData['type'];
            $linea->ticket_id = $ticket->id;
            $linea->save();

        }

        //Generate QR code with Ticket ID, status, and price
        $qrData = [
          'Ticket ID' => $ticket->id,
          'Email' => $ticket->user_email,
          'Name' => $ticket->user_name,
          'Price' => $ticket->final_price,
      ];

      $qrCode = QrCode::size(300)->generate(json_encode($qrData));

      $qrCodeFolderPath = 'public/qrcodes';

      $qrCodeFileName = uniqid() . '.png';

      try {
        Storage::disk('local')->put($qrCodeFolderPath . '/' . $qrCodeFileName, $qrCode);
    } catch (\Exception $e) {
        // Registra el error para fines de depuración
        \Log::error('Error al almacenar el código QR: ' . $e->getMessage());
        // Maneja el error de manera adecuada o devuelve una respuesta de error.
        return response()->json(['error' => 'Error al almacenar el código QR'], 500);
    }    
      
        return response()->json(['mensaje' => 'Ticket guardado correctamente']);
    }

    public function show($id)
    {
        $ticket = DB::table('tickets')
            ->join('linea_tickets', 'linea_tickets.ticket_id', '=', 'tickets.id')
            ->select('tickets.*', 'linea_tickets.*')
            ->where('tickets.id', '=', $id)
            ->get();

        return response()->json($ticket);
    }


    public function showWeb($id)
    {
        $ticket = DB::table('tickets')
            ->join('linea_tickets', 'linea_tickets.ticket_id', '=', 'tickets.id')
            ->select('tickets.*', 'linea_tickets.*')
            ->where('tickets.id', '=', $id)
            ->get();

        dd($ticket);

        return view('tickets.show', ['ticket' => $ticket]);
    }
    public function update($id)
    {
    }

    public function destroy($id)
    {
        $ticket = ticket::find($id);
        $ticket->delete();
    }
}