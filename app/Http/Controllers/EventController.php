<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\ShowEventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psy\Readline\Hoa\EventSource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $events = EventResource::collection($events);
        return  response()->json(['success'=>true, 'data'=>$events],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Event::store($request);
        return response()->json(['success' =>true, 'data' => $event],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        $events = new ShowEventResource($event);
        return response()->json(['success' =>true, 'data' => $events],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event= Event::store($request,$id);
        return response()->json(['success' =>true, 'date' =>$event],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(['success' =>true, 'message' => 'Date delete successfully'],200);
    }

    
    public function search(){
        $event = Event::where('name','LIKE','%'. request('name'). '%')->get();
        return response()->json(['success' =>true, 'data' => $event],200);
    }
}
