<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreReferenceRequest;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

final class ReferenceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReferenceRequest $request)
    {
        $reference = new Reference();
        $reference->title = $request->get('title');
        $reference->url = $request->get('url');
        $reference->author = $request->get('author');
        $reference->project_id = $request->get('project_id');
        $reference->accessed_at = Carbon::now();
        $reference->type = $request->get('type');
        $reference->save();
        return response()->redirectToRoute('projects.show', ['project' => $reference->project]);
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
    public function destroy(string $id)
    {
        //
    }
}
