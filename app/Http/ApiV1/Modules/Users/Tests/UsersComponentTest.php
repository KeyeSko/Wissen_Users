<?php

use App\Domain\Users\Models\Users;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('POST /api/v1/Users/Users create success', function () {
    $request = [
        'username' => 'Test username',
        'password_hash' => 'test Users password_hash',
        'email' => 'test Users email',
        'role' => 'test Users role',
    ];

    postJson('/api/v1/Users/Users', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.username', $request['username'])
        ->assertJsonPath('data.password_hash', $request['password_hash'])
        ->assertJsonPath('data.email', $request['email'])
        ->assertJsonPath('data.role', $request['role']);

    assertDatabaseHas(Users::class, [
        'username' => $request['username'],
    ]);
});

test('GET /api/v1/Users/Users/{id} get Users success', function () {
    /** @var Users $Users */
    $Users = Users::factory()->create();

    getJson("/api/v1/Users/Users/{$Users->id}")
        ->assertStatus(200)
        ->assertJsonPath('data.username', $Users->username)
        ->assertJsonPath('data.password_hash', $Users->password_hash)
        ->assertJsonPath('data.email', $Users->email)
        ->assertJsonPath('data.role', $Users->role);
});