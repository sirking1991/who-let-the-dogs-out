<?php

namespace App\Http\Livewire;

use App\Models\Like;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Breeds extends Component
{    
    public $error = '';

    public function render()
    {
        $breeds = getBreeds();

        return view('livewire.breeds', ['breeds' => $breeds]);
    }

    public function like($breed)
    {
        $user = Auth::user();

        // check if user has not yet reach the like limit
        if($user->likes->count()>=3) {
            $this->error = 'You have already liked 3 breeds.';
            return;
        }

        // check that user hasn't like this breed yet
        if($user->likes->where('breed', $breed)->count() > 0) {
            $this->error = 'You have already liked this breed.';
            return;
        }

        Like::create([
            'user_id' => $user->id,
            'breed' => $breed
        ]);

        $this->emit('render');
    }
}
