<?php

use App\Models\{Question, User};

use Illuminate\Pagination\LengthAwarePaginator;

use function Pest\Laravel\{actingAs, get};

it('should list all the questions', function () {
    $user = User::factory()->create();
    actingAs($user);
    $questions = Question::factory()->count(5)->create();

    $response = get(route('dashboard'));

    /** @var Question $q */
    foreach ($questions as $q) {
        $response->assertSee($q->question);
    }
});
it('should paginate the result', function () {
    $user = User::factory()->create();
    actingAs($user);
    Question::factory()->count(20)->create();

    get(route('dashboard'))
        ->assertViewHas('questions', fn ($value) => $value instanceof LengthAwarePaginator);
});
