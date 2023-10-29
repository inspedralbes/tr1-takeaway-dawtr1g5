<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\LineaTicket;
use Illuminate\Support\Facades\DB;

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
