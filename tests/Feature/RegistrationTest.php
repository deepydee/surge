<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

use function PHPSTORM_META\map;

class RegistrationTest extends TestCase
{
   use RefreshDatabase;

   /** @test */
   function registration_page_contains_livewire_component() {
        $this->get('/register')->assertSeeLivewire('auth.register');
   }

   /** @test */
   function can_register()
   {
        Livewire::test('auth.register')
            ->set('email', 'synthex@bk.ru')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertRedirect('/');

        $this->assertTrue(User::whereEmail('synthex@bk.ru')->exists());
        $this->assertEquals('synthex@bk.ru', auth()->user()->email);
   }

   /** @test */
   function email_is_required()
   {
        Livewire::test('auth.register')
            ->set('email', '')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' => 'required']);
   }

   /** @test */
   function email_is_valid_email()
   {
        Livewire::test('auth.register')
            ->set('email', '123')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' => 'email']);
   }

   /** @test */
   function email_hasnt_been_taken_already()
   {
        User::create([
            'email' => 'synthex@bk.ru',
            'password' => Hash::make('secret'),
        ]);

        Livewire::test('auth.register')
            ->set('email', 'synthex@bk.ru')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
   }

   /** @test */
   function see_email_hasnt_already_been_taken_validation_message_as_user_types()
   {
        User::create([
            'email' => 'pupu@bk.ru',
            'password' => Hash::make('secret'),
        ]);

        Livewire::test('auth.register')
            ->set('email', 'pupi@bk.ru')
            ->assertHasNoErrors()
            ->set('email', 'pupu@bk.ru')
            ->assertHasErrors(['email' => 'unique']);
   }

   /** @test */
   function password_is_required()
   {
        Livewire::test('auth.register')
            ->set('email', 'synthex@bk.ru')
            ->set('password', '')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' => 'required']);
   }

   /** @test */
   function password_is_minimum_6_characters()
   {
        Livewire::test('auth.register')
            ->set('email', 'synthex@bk.ru')
            ->set('password', '12345')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' => 'min:6']);
   }

   /** @test */
   function password_matches_password_confirmation()
   {
        Livewire::test('auth.register')
            ->set('email', 'synthex@bk.ru')
            ->set('password', '12345')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' => 'same:passwordConfirmation']);
   }

}
