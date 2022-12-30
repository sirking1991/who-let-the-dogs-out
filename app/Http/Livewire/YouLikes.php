<?php

namespace App\Http\Livewire;

use App\Models\Like;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class YouLikes extends Component
{
    protected $listeners = ['render'];

    public function render()
    {
        $user = Auth::user();

        return view('livewire.you-likes', ['user' => $user]);
    }

    public function unlike($id)
    {
        Like::find($id)->delete();

        $this->emit('render');
    }
}
