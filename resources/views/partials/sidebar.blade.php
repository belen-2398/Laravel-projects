    <div class="pl-6 bg-white m-1">

        {{-- search --}}
   <div class="m-6 ml-auto w-52 flex justify-end">
       <form action="{{ route('notes.index') }}" method="GET">
           <div class="flex">
               <input type="text" name="search" placeholder="Search notes" class="rounded-md px-3 py-2 focus:ring-yellow-600 focus:border-yellow-600 flex-1 block w-full sm:text-sm border-gray-300">
               <button type="submit" class="text-black block font-bold rounded-md px-3 py-2 text-base hover:bg-yellow-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600">
                   <span class="sr-only">Search notes</span>
                   <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                   </svg>
               </button>
           </div>
       </form>   
   </div>

       {{-- categories --}}
       <h3 class="bg-yellow-200 shadow w-3/4 m-4 p-6 px-4 sm:px-6 lg:px-8 rounded-md text-black hover:bg-yellow-700 hover:text-white text-base font-medium">
           <a href="{{ route('categories.index') }}"> All categories </a>
       </h3>
       <div class="text-right mb-8 mr-10">
        <ul>
        @foreach($categories->sortBy('name') as $category)
          <li class="mb-2 bg-white rounded-md p-3">
            <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="text-blue-800 hover:underline">{{ $category->name }}</a>
          </li>
        @endforeach
    </ul>
       </div>
       <a href="{{ route('categories.create') }}" class="bg-yellow-600 text-white font-bold py-2 px-4 rounded-md hover:bg-yellow-700">Create new category</a>

</div>