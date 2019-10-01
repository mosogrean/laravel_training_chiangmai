<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testGuestCanRegister()
    {
        $user = factory(User::class)->make();

        $this->get(route('user.regis.page'))
            ->assertStatus(200)
            ->assertViewIs('user.regis');

        $this->post(route('user.regis'), [
            '_token' => \Session::token(),
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertRedirect(route('user.login.page'));

        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    public function testGuestCannotRegisterWhenExist()
    {
        $user = factory(User::class)->create();

        $this->get(route('user.regis.page'))
            ->assertStatus(200)
            ->assertViewIs('user.regis');

        $this->post(route('user.regis'), [
            '_token' => \Session::token(),
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertRedirect(route('user.regis.page'));
    }

    public function testUserCanLogin()
    {
        $user = factory(User::class)->create();

        $this->get(route('user.login.page'))
            ->assertViewIs('user.login')
            ->assertStatus(200);

        $this->post(route('user.login'), [
            '_token' => \Session::token(),
            'email' => $user->email,
            'password' => 'password',
        ])->assertSuccessful();

        $this->assertNotEmpty(Auth::user());
    }



}
