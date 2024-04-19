<?php

use App\Domain\Users\Models\Users;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('POST /api/v1/users/users create success', function () {
    $request = [
        'username' => 'Test username',
        'password_hash' => 'Test password_hash',
        'role' => 'Test role',
        'email' => 'Test email',
    ];

    postJson('/api/v1/users/users', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.username', $request['username'])
        ->assertJsonPath('data.password_hash', $request['password_hash'])
        ->assertJsonPath('data.role', $request['role'])
        ->assertJsonPath('data.email', $request['email']);

    assertDatabaseHas(Users::class, [
        'username' => $request['username'],
    ]);
});

test('GET /api/v1/users/users/{id} get users success', function () {
    /** @var Users $users */
    $users = Users::factory()->create();

    getJson("/api/v1/users/users/{$users->id}")
        ->assertStatus(200)
        ->assertJsonPath('data.username', $users->username)
        ->assertJsonPath('data.password_hash', $users->password_hash)
        ->assertJsonPath('data.email', $users->email)
        ->assertJsonPath('data.role', $users->role);
});