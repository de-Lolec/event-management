<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        session()->forget('eventId');

        return view("layouts.admin", compact("events"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);

        session(['eventId' => $id]);

        return view("layouts.admin", compact("event"));
    }
}
