<?php

use App\Models\Taxonomy;
use App\Models\Term;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

test('Can create a term', function () {
    $taxonomy = Taxonomy::factory()->create();
    $term = Term::factory()->create([
        'taxonomy_id' => $taxonomy->id,
    ]);
    expect($term->taxonomy->id)->toEqual($taxonomy->id);
});
