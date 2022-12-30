<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 overflow-scroll">
            <h3>Breeds you like</h3>

            <div @class(['alert alert-warning', 'd-none' => $user->likes->count()>0]) role="alert">
                You currently have no like breeds. 
            </div>

            <div class="d-flex flex-row">
                @foreach ($user->likes as $like)
                <div class='p-2'>
                    <div class="card" style="width: 15rem; height:300px;">
                        <img src="{{ getBreedImage($like->breed) }}" style="height: 200px;" class="img-thumbnail card-img-top" alt="{{ $like->breed }}">
                        <div class="card-body">
                        <h5 class="card-title fw-bold">{{ ucfirst($like->breed) }}</h5>
                        <button wire:click="unlike({{ $like->id }})" class="btn btn-danger">I dont like this</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>            
        </div>
    </div>
</div>