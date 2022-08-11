<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    function can_see_livewire_profile_component_on_profile_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->withoutExceptionHandling()
            ->get('/profile')
            ->assertSuccessful()
            ->assertSeeLivewire('profile');
    }

    /** @test */

    function can_update_profile()
    {
        $user = User::factory()->create();
        
        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', 'foo')
            ->set('about', 'bar')
            ->call('save');

        $user->refresh();
       
        $this->assertEquals('foo', $user->username);
        $this->assertEquals('bar', $user->about);
    }

    /** @test */

    function profile_info_is_pre_populated()
    {
        $user = User::factory()->create([
            'username' => 'foo',
            'about' => 'bar',
        ]);
        
        Livewire::actingAs($user)
            ->test('profile')
            ->assertSet('username', 'foo')
            ->assertSet('about', 'bar');
    }

    /** @test */

    function message_is_shown_on_save()
    {
        $user = User::factory()->create([
            'username' => 'foo',
            'about' => 'bar',
        ]);
        
        Livewire::actingAs($user)
            ->test('profile')
            ->assertDontSee('Successfully saved!')
            ->call('save')
            ->assertSee('Successfully saved!');
    }

    /** @test */

    function username_must_be_less_than_24_characters()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', str_repeat('a', 25))
            ->set('about', 'bar')
            ->call('save')
            ->assertHasErrors(['username' => 'max']);
    }

    /** @test */

    function about_must_be_less_than_140_characters()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', 'foo')
            ->set('about', str_repeat('a', 141))
            ->call('save')
            ->assertHasErrors(['about' => 'max']);
    }

}