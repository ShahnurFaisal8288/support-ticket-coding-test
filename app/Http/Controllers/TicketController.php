<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();
        if ($auth->is_admin === 'yes') {
            $tickets = Ticket::all();
        }else{
            $tickets = Ticket::where('user_id',$auth->id)->get();
        }
        return view('backend.dashboard.dashboard', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auth = Auth::user()->id;
        $ticket = new Ticket();
        $ticket->user_id = $auth;
        $ticket->subject = $request->subject;
        $ticket->issues = $request->issues;
        $ticket->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->subject = $request->subject;
        $ticket->issues = $request->issues;
        $ticket->status = $request->status;
        $ticket->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ticket::findOrFail($id)->delete();
        return back();
    }
}
