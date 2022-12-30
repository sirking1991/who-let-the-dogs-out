<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

if(!function_exists('getBreeds')) {
    function getBreeds() {
        return Cache::remember(
            'breeds',
            now()->addDay(), 
            function(){
                $response = Http::get(config('app.dog-ceo-api') . '/breeds/list/all');

                $breeds = [];
                foreach ($response->json('message') as $parent => $child) {
                    if (!empty($child)) {
                        foreach($child as $breed) {
                            $breeds[] = $parent . '-' . $breed;
                        }
                    } else {
                        $breeds[] = $parent;
                    }
                }
                return $breeds;
            }
        );
    }
}

if(!function_exists('getBreedImage')) {
    function getBreedImage($breed){
        return Cache::remember(
            'breed-image-' . $breed,
            now()->addDay(), 
            function() use ($breed) {
                $breed = str_replace('-', '/', $breed);

                $response = Http::retry(3, 1000)
                    ->timeout(10)
                    ->get(config('app.dog-ceo-api') . '/breed/' . $breed . '/images/random');

                if($response->ok() && $response->successful()) {
                    \Log::debug(__METHOD__, ['image' => $response->json('message')]);
                    return $response->json('message');
                } else {
                    \Log::debug(__METHOD__ . ': could not get image for ' . $breed);
                    return "https://dog.ceo/img/dog-api-logo.svg";
                }

                
            }
        );
    }
}