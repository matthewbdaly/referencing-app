<?php

use App\Models\Taxonomy;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

test('Can create a taxonomy', function () {
    $taxonomy = Taxonomy::factory()->create();
    expect($taxonomy->id)->toBeTruthy();
});
