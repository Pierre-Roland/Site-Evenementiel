<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        $request->validate([
            'username' => 'required|string|max:255',
            'comment' => 'required|string',
            'idEvent' => 'required|integer',
        ]);

        $commentaire = Commentaire::create([
            'username' => $request->username,
            'comment' => $request->comment,
            'idEvent' => $request->idEvent,
            'date' => now(),
        ]);

        return response()->json([
            'success' => true,
            'commentaire' => $commentaire
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $commentaires = Commentaire::where('idEvent', $id)
                ->orderBy('date', 'asc')
                ->take(10)
                ->get()
                ->map(function($comment) {
                    return [
                        'id' => $comment->id,
                        'username' => $comment->username ?? 'Invité',
                        'comment' => $comment->comment,
                        'date' => $comment->date,
                    ];
                });

            return response()->json($commentaires);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
