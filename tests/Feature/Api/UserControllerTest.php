<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use WithFaker;

    public function test_it_should_return_all_users(): void
    {
        $response = $this->getJson(route('api.users.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data'
        ]);
    }

    public function test_it_should_be_possible_to_create_a_user(): void
    {
        $payload = [
            'first_name' => 'test',
            'last_name' => 'api',
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
            'password' => '12345678',
            'mobile' => '123456789',
        ];

        $response = $this->postJson(route('api.users.store'), $payload);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'first_name',
                'last_name',
                'username',
                'email',
                'mobile',
            ]
        ]);
        $this->assertDatabaseHas('users', [
            'email' => $payload['email'],
            'username' => $payload['username']
        ]);
    }

    public function test_it_should_not_be_possible_to_create_user_with_invalid_email(): void
    {
        $payload = [
            'first_name' => 'test',
            'last_name' => 'api',
            'username' => $this->faker->userName,
            'email' => 'test',
            'password' => '12345678',
            'mobile' => '123456789',
        ];

        $response = $this->postJson(route('api.users.store'), $payload);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'email'
            ]
        ]);
        $response->assertJsonValidationErrors('email');
    }

    public function test_it_should_not_be_possible_to_create_user_with_invalid_password(): void
    {
        $payload = [
            'first_name' => 'test',
            'last_name' => 'api',
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
            'password' => '1234567',
            'mobile' => '123456789',
        ];

        $response = $this->postJson(route('api.users.store'), $payload);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'password'
            ]
        ]);
        $response->assertJsonValidationErrors('password');
    }

    public function test_it_should_not_be_possible_to_create_user_with_invalid_mobile(): void
    {
        $payload = [
            'first_name' => 'test',
            'last_name' => 'api',
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
            'password' => '12345678',
            'mobile' => '12345678',
        ];

        $response = $this->postJson(route('api.users.store'), $payload);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'mobile'
            ]
        ]);
        $response->assertJsonValidationErrors('mobile');
    }

    public function test_it_should_not_be_possible_to_create_user_with_invalid_username(): void
    {
        $payload = [
            'first_name' => 'test',
            'last_name' => 'api',
            'username' => 'hi',
            'email' => $this->faker->email,
            'password' => '12345678',
            'mobile' => '123456789',
        ];

        $response = $this->postJson(route('api.users.store'), $payload);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'username'
            ]
        ]);
        $response->assertJsonValidationErrors('username');
    }

    public function test_it_should_be_possible_to_update_a_user(): void
    {
        $user = User::factory()->create();

        $payload = [
            'first_name' => 'test',
            'last_name' => 'api',
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
            'password' => '12345678',
            'mobile' => '123456789',
        ];

        $response = $this->putJson(route('api.users.update', $user), $payload);

        $response->assertStatus(204);
        $this->assertDatabaseHas('users', [
            'email' => $payload['email'],
            'username' => $payload['username']
        ]);
    }

    public function test_it_should_not_be_possible_to_update_user_with_invalid_email(): void
    {
        $user = User::factory()->create();

        $payload = [
            'first_name' => 'test',
            'last_name' => 'api',
            'username' => $this->faker->userName,
            'email' => 'test',
            'password' => '12345678',
            'mobile' => '123456789',
        ];

        $response = $this->putJson(route('api.users.update', $user), $payload);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'email'
            ]
        ]);
        $response->assertJsonValidationErrors('email');
    }

    public function test_it_should_not_be_possible_to_update_user_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $payload = [
            'first_name' => 'test',
            'last_name' => 'api',
            'username' => $this->faker->userName,
            'email' => $this->faker->email,
            'password' => '1234567',
            'mobile' => '123456789',
        ];

        $response = $this->putJson(route('api.users.update', $user), $payload);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => [
                'password'
            ]
        ]);
        $response->assertJsonValidationErrors('password');
    }

    public function it_should_be_possible_to_delete_a_user(): void
    {
        $user = User::factory()->create();

        $response = $this->deleteJson(route('api.users.destroy', $user));

        $response->assertStatus(204);
        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }
}
