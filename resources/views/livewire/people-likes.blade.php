<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 overflow-scroll">
            <h3>Breeds others like</h3>

            <div class="d-flex flex-row">
                @foreach ($users as $user)
                <div class='p-2'>
                    <div class="card" style="width: 15rem; height:300px;">
                        <img src="{{ Gravatar::get($user->email) }}" style="height: 160px;" class="img-thumbnail card-img-top" alt="{{ $user->name }}">
                        <div class="card-body">
                        <h5 class="card-title fw-bold">{{ ucfirst($user->name) }} likes</h5>
                        <ul>
                            @foreach ($user->likes as $like)
                            <li>                                
                                {{ ucfirst($like->breed) }}
                            </li>
                            @endforeach
                        </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>            
        </div>
    </div>
</div>