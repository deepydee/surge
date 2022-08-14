<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $username = '';
    public $about = '';
    public $birthday = null;
    public $newAvatar;

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->about = auth()->user()->about;
        $this->birthday = auth()->user()->birthday->format('m/d/Y');
    }

    public function updatedUsername()
    {
        $this->validate([
            'username' => 'max:24',
            'about' => 'max:140',
        ]);
    }

    public function updatedNewAvatar()
    {
        $this->validate([
            'newAvatar' => 'image|max:300',
        ]);
    }

    public function updatedAbout()
    {
        $this->validate([
            'username' => 'max:24',
            'about' => 'max:140',
        ]);
    }
    
    public function save()
    {
        $profileData = $this->validate([
            'username' => 'max:24',
            'about' => 'max:140',
            'birthday' => 'sometimes',
            'newAvatar' => 'image|max:300',
        ]);

        $filename = $this->newAvatar->store('/', 'avatars');

        auth()->user()->update([
            'username' => $this->username,
            'about' => $this->about,
            'birthday' => $this->birthday,
            'photo' => $filename
        ]);

        $this->emitSelf('notify-saved');
    }

    public function render()
    {
        return view('livewire.profile')
            ->layout('layouts.app');
    }
}
