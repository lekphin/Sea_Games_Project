<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowTicketResource;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return  response()->json(['success'=>true, 'data'=>$tickets],200); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'price' => request('price'),
            'date' => request('date'),
            'user_id' =>request('user_id'),
            'event_id' => request('event_id'),
        ]);
        return response()->json(['success' =>true, 'data' => $ticket],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);
        // $ticket = new ShowTicketResource($ticket);
        return response()->json(['success' =>true, 'data' => $ticket],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->update([
            'price' => request('price'),
            'date' => request('date'),
            'user_id' =>request('user_id'),
            'event_id' => request('event_id'),
        ]);
        return response()->json(['success' =>true, 'date' =>$ticket],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json(['success' =>true, 'message' => 'Date delete successfully'],200);
    }
}
