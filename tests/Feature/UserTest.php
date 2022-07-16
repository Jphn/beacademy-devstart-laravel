<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function testValidUserCanAccessTablePage()
	{
		$user = User::factory()->create();

		$this->post('login', [
			'email' => $user->email,
			'password' => 'password'
		]);

		$this->actingAs($user);

		$response = $this->get(route('users.index'));

		$response->assertStatus(200);
	}

	public function testUserCanRegister()
	{
		// PREPARE
		$payload = [
			'name' => 'Test Name',
			'email' => 'test.only@email.com',
			'password' => 'password',
			'is_admin' => true
		];

		// ACT
		$response = $this->post('/login/create', $payload);

		// ASSERT
		$response->assertStatus(200);
	}
}
