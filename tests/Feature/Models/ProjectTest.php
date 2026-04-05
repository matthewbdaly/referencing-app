<?php

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Faker\fake;

pest()->use(RefreshDatabase::class);

test('Can create a project', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create([
        'name'     => fake()->word(),
        'owner_id' => $user->id,
    ]);
    expect($user->projects->first()->id)->toEqual($project->id);
});
