<?php

use App\Models\Project;
use App\Models\User;
use App\ReferenceType;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Faker\fake;

pest()->use(RefreshDatabase::class);

test('Can create a reference', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create([
        'name'     => fake()->word(),
        'owner_id' => $user->id,
    ]);
    $reference = $project->references()->create([
        'title'  => 'Word Processors: Stupid and Inefficient',
        'type'   => ReferenceType::JournalArticle,
        'author' => 'Cottrell, Allin',
        'url'    => 'https://pi.math.cornell.edu/~noonan/writing/wp.pdf',
    ]);
    expect($project->references->first()->id)->toEqual($reference->id);
});
