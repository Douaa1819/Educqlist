<?php

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;


//register
it('user can register and login', function () {
    $user = User::factory()->create([
        'password' => Hash::make($password = 'i-love-laravel'), 
    ]);
    $response = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => $password,
    ]);

    $response->assertStatus(200)
             ->assertJson([
                 'status' => true,
                 'message' => 'User Logged In Successfully',
             ]);
});



it('allows a user to log in', function () {
    $user = User::factory()->create([
        'password' => Hash::make($password = 'secret'),
    ]);

    $response = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => $password,
    ]);
    $response->assertStatus(200)
             ->assertJson([
                 'status' => true,
                 'message' => 'User Logged In Successfully',
             ]);
});



// it('allows a user to logout', function () {
//     $user = User::factory()->create();
//     $this->actingAs($user);
//     $response=$this->postJson('/api/progress/logout')
//            ->assertStatus(200)
//              ->assertJson([
//                  'message' => 'logged out',
//              ]);
// });

