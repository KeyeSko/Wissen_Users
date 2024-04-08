<?php

use App\Domain\UserBooks\Models\UserBooks;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('POST /api/v1/UserBooks/UserBooks create success', function () {
    $request = [
        'username' => 'Test username',
        'password_hash' => 'test UserBooks password_hash',
        'email' => 'test UserBooks email',
        'role' => 'test UserBooks role',
    ];

    postJson('/api/v1/UserBooks/UserBooks', $request)
        ->assertStatus(201)
        ->assertJsonPath('data.username', $request['username'])
        ->assertJsonPath('data.password_hash', $request['password_hash'])
        ->assertJsonPath('data.email', $request['email'])
        ->assertJsonPath('data.role', $request['role']);

    assertDatabaseHas(UserBooks::class, [
        'username' => $request['username'],
    ]);
});

test('GET /api/v1/UserBooks/UserBooks/{id} get UserBooks success', function () {
    /** @var UserBooks $UserBooks */
    $UserBooks = UserBooks::factory()->create();

    getJson("/api/v1/UserBooks/UserBooks/{$UserBooks->id}")
        ->assertStatus(200)
        ->assertJsonPath('data.username', $UserBooks->username)
        ->assertJsonPath('data.password_hash', $UserBooks->password_hash)
        ->assertJsonPath('data.email', $UserBooks->email)
        ->assertJsonPath('data.role', $UserBooks->role);
});    
test('POST /api/v1/userbooks/userbooks 201', function () {
    postJson('/api/v1/userbooks/userbooks')
        ->assertStatus(201);
});

test('POST /api/v1/userbooks/userbooks 400', function () {
    postJson('/api/v1/userbooks/userbooks')
        ->assertStatus(400);
});

test('GET /api/v1/userbooks/userbooks/{id} 200', function () {
    getJson('/api/v1/userbooks/userbooks/{id}')
        ->assertStatus(200);
});

test('GET /api/v1/userbooks/userbooks/{id} 404', function () {
    getJson('/api/v1/userbooks/userbooks/{id}')
        ->assertStatus(404);
});
