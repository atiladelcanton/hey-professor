<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, put};

it('should update the question in the database', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->for($user, 'createdBy')->create(['draft' => true]);

    actingAs($user);

    put(route('question.update', $question), [
        'question' => 'Updated Question?',
    ])
        ->assertRedirect();
    $question->refresh();
    expect($question)
        ->question->toBe('Updated Question?');
});
