<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function should_user_create_return ()
    {
        $testData = [
            'name' => 'test user',
            'email' => 'test@email.com',
            'password' => 'testtest',
            'password_confirmation' => 'testtest'
        ];

        $response = $this->json('POST', route('register'), $testData);

        $user = User::first();
        $this->assertEquals($testData['name'], $user->name);

        $response
            ->assertStatus(201)
            ->assertJson(['name' => $user->name]);
    }
}
