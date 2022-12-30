<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PeopleLikes extends Component
{
    public function render()
    {
        $users = User::whereNot('id', Auth::user()->id)->get();

        return view('livewire.people-likes', ['users' => $users]);
    }
}
