<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_get_all_users(): void
    {
        $response = $this->getJson('/api/v1/users');
        $this->assertNotEmpty(json_decode($response->getContent(), true));
    }

    public function test_user_create_success(): void
    {
        $department = Department::inRandomOrder()->first();
        $user = [
            "userName" => "Test User 1",
            "departmentId" => $department->id,
        ];

        $response = $this->postJson('/api/v1/user', $user);

        $response->assertStatus(201);
    }

    public function test_user_update_success(): void
    {
        $user = User::inRandomOrder()->first();
        $department = Department::inRandomOrder()->first();
        $updateUser = [
            "userNo" => $user->id,
            "userName" => "Test User 2",
            "departmentNo" => $department->id,
        ];

        $response = $this->putJson('/api/v1/user/update', $updateUser);
        $response->assertStatus(201);
    }

    public function test_user_delete_success(): void
    {
        $user = User::inRandomOrder()->first();
        $deleteUser = [
            "userNo" => $user->id,
        ];

        $response = $this->deleteJson('/api/v1/user/delete', $deleteUser);
        $response->assertStatus(200);
    }
}
