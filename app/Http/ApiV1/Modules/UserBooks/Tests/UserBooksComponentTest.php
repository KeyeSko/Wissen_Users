<?php

use App\Domain\UserBooks\Models\UserBooks;
use App\Domain\Users\Models\Users;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('POST /api/v1/userbooks/userbooks create success', function () {
    $user = Users::factory()->create();
    $request = [
        'user_id' => $user->id,
        'book_id' => 3,
        'status' => 'Reading',
        'read_date' => '2024-01-01',
        'abandon_date' => '2024-01-01',
        'rating' => '5',
    ];
    //$this->withoutExceptionHandling();
    //postJson('/api/v1/users/users', $user)
    postJson('/api/v1/userbooks/userbooks', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.user_id', $request['user_id'])
        ->assertJsonPath('data.book_id', $request['book_id'])
        ->assertJsonPath('data.status', $request['status'])
        ->assertJsonPath('data.read_date', $request['read_date'])
        ->assertJsonPath('data.abandon_date', $request['abandon_date']);

    assertDatabaseHas(UserBooks::class, [
        'user_id' => $request['user_id'],
    ]);
});

test('GET /api/v1/userbooks/userbooks/{id} get userbooks success', function () {
    /** @var UserBooks $UserBooks */
    $user = Users::factory()->create();
    $userbooks = UserBooks::factory()->create();

    getJson("/api/v1/userbooks/userbooks/{$userbooks->id}")
        ->assertStatus(200)
        ->assertJsonPath('data.user_id', $userbooks->user_id)
        ->assertJsonPath('data.book_id', $userbooks->book_id)
        ->assertJsonPath('data.status', $userbooks->status)
        ->assertJsonPath('data.read_date', $userbooks->read_date)
        ->assertJsonPath('data.abandon_date', $userbooks->abandon_date);
});