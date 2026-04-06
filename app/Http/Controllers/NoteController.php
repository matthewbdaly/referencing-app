<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;

final class NoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $note = new Note();
        $note->reference_id = $request->get('reference_id');
        $note->body = $request->get('body');
        $note->author_id = $request->user()->id;
        $note->save();
        return response()->redirectToRoute('references.show', ['reference' => $note->reference]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $reference = $note->reference;
        $note->delete();
        return response()->redirectToRoute('references.show', ['reference' => $reference]);
    }
}
