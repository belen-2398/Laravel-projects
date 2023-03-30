
@include('partials.head')
@include('partials.nav')
@include('partials.banner')

<main class="flex">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">    
        @if ($category->notes->isEmpty())
            <p>There are no notes in this category yet.</p>
        @else
        <form action="{{ route('categories.show', $category) }}" method="GET">
          @include('partials.sort')
            <div class="grid grid-cols-4 gap-4 pr-6"> 
                @foreach ($notes as $index => $note)
                    @include('partials.noteAspect')
                @endforeach

            </div>
            <div class="mt-16">
                <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
                    <a href="{{ route("categories.edit", $category) }}" class="text-white inline-block font-semibold hover:underline rounded px-4 py-3 sm:px-6 bg-purple-800 m-2 ml-6">Edit category</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class= "text-white inline-block font-semibold hover:underline rounded px-4 py-3 sm:px-6 bg-red-800">Delete category</button>
                </form>
            </div>
        @endif
    </div>

<div class="w-1/4">
  <div class="m-6 ml-auto w-52 flex justify-end">
    <form action="{{ route('notes.index', $category) }}" method="GET">
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
</div>
</main>

@include('partials.foot')
