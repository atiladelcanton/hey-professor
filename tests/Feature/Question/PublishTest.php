<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, put};

it('should be able to publish a question', function () {
    $user     = User::factory()->create();
    $question = Question::factory()
        ->for($user, 'createdBy')
        ->create(['draft' => true]);
    actingAs($user);
    put(route('question.publish', $question))
        ->assertRedirect();
    $question->refresh();
    expect($question)
        ->draft->toBeFalse();
});

it('should make sure that only the person who has created the question can publish the question', function () {
    $writeUser = User::factory()->create();
    $userWrong = User::factory()->create();
    $question  = Question::factory()->forCreatedBy($writeUser)->create(['draft' => true, 'created_by' => $writeUser->id]);
    actingAs($userWrong);

    put(route('question.publish', $question))
        ->assertForbidden();

    actingAs($writeUser);

    put(route('question.publish', $question))
        ->assertRedirect();
});
