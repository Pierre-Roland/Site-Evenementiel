<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Lire tous les événements
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('events.create');
    }

    // Stocker un nouvel événement
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'rate' => 'required|integer',
        ]);

        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Événement créé !');
    }

    // Afficher un événement
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // Formulaire pour modifier un événement
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    // Mettre à jour un événement
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'rate' => 'required|integer',
        ]);

        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Événement mis à jour !');
    }

    // Supprimer un événement
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Événement supprimé !');
    }
}
