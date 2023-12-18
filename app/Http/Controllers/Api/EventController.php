<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\EventRequest;
use App\Models\UserEvent;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;


class EventController extends Controller
{
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

    public function create(EventRequest $request)
    {
        try {
            $event = Event::create($request->all());

            return response()->json(['error' => null, 'result' => ['id' => $event->id, 'title' => $event->title, 'text' => $event->text]], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create event', 'result' => null], 500);
        }
    }

    public function participate(Request $request, $eventId)
    {
        try {
            $event = Event::findOrFail($eventId);

            $userEvent = new UserEvent([
                'user_id' => auth()->id(),
                'event_id' => $event->id,
            ]);

            $userEvent->save();

            return response()->json(['error' => null, 'result' => 'Participation successful'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Event not found', 'result' => null], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to participate in the event', 'result' => null], 500);
        }
    }

    public function cancelParticipation(Request $request, $eventId)
    {
        try {
            $event = Event::findOrFail($eventId);

            $userEvent = UserEvent::where('user_id', auth()->id())->where('event_id', $event->id)->first();

            if ($userEvent) {
                $userEvent->delete();
                return response()->json(['error' => null, 'result' => 'Participation canceled'], 200);
            } else {
                return response()->json(['error' => 'User not participating in the event', 'result' => null], 404);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Event not found', 'result' => null], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to cancel participation in the event', 'result' => null], 500);
        }
    }

    public function deleteEvent(Request $request, $eventId)
    {
        try {
            $event = Event::findOrFail($eventId);

            if ($event->creator_id === auth()->id()) {
                $event->delete();
                return response()->json(['error' => null, 'result' => 'Event deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'You are not the creator of this event', 'result' => null], 403);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Event not found', 'result' => null], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete the event', 'result' => null], 500);
        }
    }
}
