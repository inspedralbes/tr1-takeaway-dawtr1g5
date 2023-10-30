<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\LineaTicket;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    //
    public function index(){

        $ticket = DB::table('tickets')
        ->join('linea_tickets', 'linea_tickets.ticket_id', '=', 'tickets.id')
        ->select('tickets.*', 'linea_tickets.*')
        ->get();

    return response()->json($ticket);

    }
    public function index_all()
    {
        $ticket = ticket::all();
        return view('tickets.show', ['tickets' => $ticket]);
    }


    public function store(Request $request)
    {
        $ticket = new Ticket;

        $ticket->final_price = $request->final_price;
        $ticket->estat = $request->estat;
        $ticket->save();

        return redirect()->route('tickets')->with('success', 'Ticket generat correctament!');
    }

    public function show($id)
    {
        $ticket = DB::table('tickets')
            ->join('linea_tickets', 'linea_tickets.ticket_id', '=', 'tickets.id')
            ->select('tickets.*', 'linea_tickets.*')
            ->where('tickets.id', '=', $id)
            ->get();

        return view('tickets.show', ['ticket'=> $ticket]);
    }

    // public function showWeb($id)
    // {
    //     $ticket = DB::table('tickets')
    //         ->join('linea_tickets', 'linea_tickets.ticket_id', '=', 'tickets.id')
    //         ->select('tickets.*', 'linea_tickets.*')
    //         ->where('tickets.id', '=', $id)
    //         ->get();

    //     // dd($ticket);

    //     return view('tickets.show', ['ticket' => $ticket]);
    // }
    public function update(Request $request, $id)
    {
        $ticket = ticket::find($id);
        $ticket->final_price = $request->final_price;
        $ticket->estat = $request->estat;
        $ticket->save();

        return redirect()->route('tickets')->with('success','Ticket actualitzat correctament!');

    }

    public function destroy($id)
    {
        $ticket = ticket::find($id);
        $ticket->delete();

        return redirect()->route('tickets')->with('success','El ticket ha sigut eliminat correctament!');
    }
}
