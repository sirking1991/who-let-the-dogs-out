<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 overflow-scroll">
            <div class="d-flex flex-row">
            @foreach ($breeds as $breed)
            <div class='p-2'>
                <div class="card" style="width: 15rem; height:300px;">
                    <img src="{{ getBreedImage($breed) }}" style="height: 200px;" class="img-thumbnail card-img-top" alt="{{ $breed }}">
                    <div class="card-body">
                    <h5 class="card-title fw-bold">{{ ucfirst($breed) }}</h5>
                    <button class="btn btn-primary">Like this</button>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>