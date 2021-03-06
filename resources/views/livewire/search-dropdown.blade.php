<div>
    <div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
                    <input wire:model.debounce.500ms="search" type="text" 
                           class="bg-gray-800 rounded-full w-64 pl-8 px-4 py-1 focus:outline-none focus:shadow-outline" 
                           placeholder="Search"
                           @focus="isOpen = true"
                           @keydown.escape.window="isOpen = false"
                           >
                    <div class="absolute top-0">
                        <i class="fa fa-search fill-current text-gray-500 mt-2 ml-2"></i>
                    </div>
    </div>
    
    <div wire:loading class="spinner top-11">

    </div>

    @if (strlen($search) >= 2)
    <div 
        class="absolute bg-gray-800 text-sm rounded w-64 mt-4" 
        x-show="isOpen"
        @keydown.escape.window="isOpen = false"
        >

            @if($searchResults->count() > 0)
                <ul>
                    @foreach($searchResults as $result)
                    <li class="border-b border-gray-700">
                    <a href="{{ route('movies.show', $result['id']) }}" class=" hover:bg-gray-700 px-3 py-3 flex items-center">
                        @if($result['poster_path'])
                            <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                            <span class="ml-4">{{ $result['title'] }}</span> 
                        @else
                            <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                        @endif
                    </a>
                    </li>
                    @endforeach
                    
                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
    </div>
     @endif
</div>

