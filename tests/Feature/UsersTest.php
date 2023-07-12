<?php

use function Pest\Laravel\{post};
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a user with valid data', function () {
    postUser([
        'name' => 'test',
        'email' => 'test@test.com',
        'password' => 'test@1234',
    ])->assertStatus(201);
})->group('users');

it('cannot create a user with the same email', function () {
    postUser([
        'name' => 'test',
        'email' => 'test@test.com',
        'password' => 'test@1234',
    ])->assertStatus(201);

    postUser([
        'name' => 'test',
        'email' => 'test@test.com',
        'password' => 'test@jsjsjjsj',
    ])->assertStatus(403)->assertJson([
        'message' => 'Validation error',
        'errors' => [
            'email' => ['The email has already been taken.']
        ]
    ]);
})->group('users');

it('cannot create a user with a password less than 8 characters', function () {
    postUser([
        'name' => 'test',
        'email' => 'test@test2.com',
        'password' => 'test',
    ])->assertStatus(403)->assertJson([
        'message' => 'Validation error',
        'errors' => [
            'password' => ['The password field must be at least 8 characters.']
        ]
    ]);
})->group('users');

function postUser(array $data)
{
    return post('/api/user/create', $data);
}
