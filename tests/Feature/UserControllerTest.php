<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JsonException;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function test_it_should_be_able_to_access_index_route_records(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('users.index');
        $response->assertViewHas('users');
    }

    /**
     * @throws JsonException
     */
    public function test_it_should_be_possible_to_create_a_user(): void
    {
        $user = User::factory()->create();

        $payload = [
            'first_name' => 'test',
            'last_name' => 'assert',
            'email' => 'test@assert.com',
            'password' => '12345678',
            'mobile' => '123456789',
            'username' => 'testassert',
        ];

        $this->actingAs($user);

        $response = $this->post(route('users.store', $payload));

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('success');
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', [
            'email' => $payload['email'],
            'username' => $payload['username']
        ]);
    }

    public function test_it_should_not_be_possible_to_create_user_with_invalid_payload(): void
    {
        $user = User::factory()->create();

        $payload = [
            'first_name' => 'test',
            'last_name' => 'as',
            'email' => 'assert',
            'password' => '12345678',
            'mobile' => '123456789',
            'username' => 'testas'
        ];

        $this->actingAs($user);

        $response = $this->post(route('users.store', $payload));

        $response->assertSessionHasErrors([
            'last_name',
            'email'
        ]);
    }

    /**
     * @throws JsonException
     */
    public function test_it_should_be_possible_to_update_a_user(): void
    {
        $user = User::factory()->create();

        $payload = [
            'first_name' => 'assert',
            'last_name' => 'test',
            'email' => 'assert@test.com',
            'password' => '12345678',
            'mobile' => '123456789',
            'username' => 'asserttest',
        ];

        $this->actingAs($user);

        $response = $this->put(route('users.update', $user), $payload);

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('success');
        $response->assertSessionHasNoErrors();
    }

    public function test_it_should_not_be_possible_to_update_a_user_with_invalid_payload(): void
    {
        $user = User::factory()->create();

        $payload = [
            'first_name' => 'assert',
            'last_name' => 'test',
            'email' => 'test',
            'password' => '12345678',
        ];

        $this->actingAs($user);

        $response = $this->put(route('users.update', $user->id), $payload);

        $response->assertSessionHasErrors([
            'email'
        ]);
    }

    /**
     * @throws JsonException
     */
    public function test_it_should_be_possible_to_delete_a_user(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->delete(route('users.destroy', $user));

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }
}
