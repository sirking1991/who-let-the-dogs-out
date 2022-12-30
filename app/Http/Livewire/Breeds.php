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
        $breeds = Cache::remember(
            'breeds',
            now()->addDay(), 
            function(){
                $response = Http::get(config('app.dog-ceo-api') . '/breeds/list/all');
                $response->throw();

                $breeds = [];
                foreach ($response->json('message') as $parent => $child) {
                    if (!empty($child)) {
                        foreach($child as $breed) {
                            $breeds[] = $parent . ' : ' . $breed;
                        }
                    } else {
                        $breeds[] = $parent;
                    }
                }
            }
        );

        dd($breeds);

        return view('livewire.breeds', ['breeds' => $breeds]);
    }
}
