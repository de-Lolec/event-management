<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;


class EventController extends Controller
{
    public function create(EventRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'creator_id' => 'required',
        ]);

        try {
            $event = Event::create($request->all());

            return response()->json(['error' => null, 'result' => ['id' => $event->id, 'title' => $event->title, 'text' => $event->text]], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create event', 'result' => null], 500);
        }
    }

    public function index()
    {
        try {
            $events = Event::all()->map(function ($event) {
                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'text' => $event->text,
                    'creator_id' => $event->creator_id,
                ];
            });

            return response()->json(['error' => null, 'result' => $events], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve events', 'result' => null], 500);
        }
    }
}
