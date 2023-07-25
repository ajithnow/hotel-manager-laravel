<?php

use function Pest\Laravel\{post};

use App\Modules\User\Models\User;
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

it('can create a user profile with valid data', function (){
    postUser([
        'name' => 'test',
        'email' => 'test@test2.com',
        'password' => 'test@yyyyei',
    ])->assertStatus(201);
    $data = [
        'user_id' => User::first()->id,
        'address_line_1' => 'ad1',
        'address_line_2' => 'ad2',
        'city' => 'city',
        'state' => 'state',
        'country'=> 'country',
        'is_verified' => false
    ];
    postUserProfile($data)->assertStatus(201);
})->group('users');

it('it cannot create a user profile with invalid id', function (){
    $data = [
        'user_id' => '01c14b35-4411-4a75-9b47-c867f1f2e720',
        'address_line_1' => 'ad1',
        'address_line_2' => 'ad2',
        'city' => 'city',
        'state' => 'state',
        'country'=> 'country',
        'is_verified' => false
    ];
    postUserProfile($data)->assertStatus(403);
})->group('users');

it('it cannot create a duplicate user profile', function (){
    postUser([
        'name' => 'test',
        'email' => 'test@test2.com',
        'password' => 'test@yuiyujjhj',
    ])->assertStatus(201);
    $data = [
        'user_id' => User::first()->id,
        'address_line_1' => 'ad1',
        'address_line_2' => 'ad2',
        'city' => 'city',
        'state' => 'state',
        'country'=> 'country',
        'is_verified' => false
    ];
    postUserProfile($data)->assertStatus(201);
    postUserProfile($data)->assertStatus(403);
})->group('users');



function postUser(array $data)
{
    return post(route('user.create'), $data);
}

function postUserProfile(array $data)
{
    return post(route('user.create-profile'), $data);
}
