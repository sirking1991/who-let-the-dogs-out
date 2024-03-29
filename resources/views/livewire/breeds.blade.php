<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 overflow-scroll">
            <h3>Breeds you might like</h3>
            <div @class(['alert alert-danger alert-dismissible fade show', 'd-none' => empty($error)]) class="" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="d-flex flex-row" style="overflow-x: scroll;">
            @foreach ($breeds as $breed)
            <div class='p-2'>
                <div class="card" style="width: 15rem; height:300px;">
                    <img src="{{ getBreedImage($breed) }}" style="height: 200px;" class="img-thumbnail card-img-top" alt="{{ $breed }}">
                    <div class="card-body">
                    <h5 class="card-title fw-bold">{{ ucfirst($breed) }}</h5>
                    <button wire:click="like('{{ $breed }}')" class="btn btn-primary">Like this</button>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>