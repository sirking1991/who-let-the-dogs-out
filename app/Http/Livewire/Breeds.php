<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Breeds extends Component
{
    public function render()
    {
        $breeds = getBreeds();

        return view('livewire.breeds', ['breeds' => $breeds]);
    }
}
