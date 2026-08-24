<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;

class EventController extends Controller
{
    public function create()
    {
        return view('events.create');
    }

    public function store(StoreEventRequest $request)
    {
        Event::create($request->validated());

        return redirect()->route('events.create');
    }
}