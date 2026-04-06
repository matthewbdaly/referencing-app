<?php

declare(strict_types=1);

use App\Models\Project;
use App\Models\Reference;
use App\Models\Taxonomy;
use App\Models\Term;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

test('Can create a term', function () {
    $taxonomy = Taxonomy::factory()->create();
    $term = Term::factory()->create([
        'taxonomy_id' => $taxonomy->id,
    ]);
    expect($term->taxonomy->id)->toEqual($taxonomy->id);
});

test('Can get references with a term', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create([
        'owner_id' => $user->id,
    ]);
    $taxonomy = Taxonomy::factory()->create();
    $term = Term::factory()->create([
        'taxonomy_id' => $taxonomy->id,
    ]);
    $reference = Reference::factory()->create([
        'project_id' => $project->id,
    ]);
    $reference->terms()->attach($term);
    expect($term->references->first()->id)->toEqual($reference->id);
    expect($reference->terms->first()->id)->toEqual($term->id);
});
