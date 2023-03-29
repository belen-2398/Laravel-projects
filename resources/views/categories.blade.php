@include('partials.head')
@include('partials.nav')
@include('partials.banner')

<main>
    <div class="m-6 ml-auto w-52 flex justify-end">
        <form action="{{ route('categories.index') }}" method="GET">
            <div class="flex">
                <input type="text" name="search" placeholder="Search categories" class="rounded-md px-3 py-2 focus:ring-yellow-600 focus:border-yellow-600 flex-1 block w-full sm:text-sm border-gray-300">
                <button type="submit" class="text-black block font-bold rounded-md px-3 py-2 text-base hover:bg-yellow-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </div>
        </form>   
    </div>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @if (empty($message)) @endif
            <div class="grid grid-cols-4 gap-4"> 
             @foreach ($categories as $index => $category)
                 <div class="bg-{{ noteBgColor($index) }}-200 rounded-lg shadow-md p-6 hover:bg-{{ noteBgColor($index) }}-300 h-4/4 w-4/4">
                    <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="text-blue-800 hover:underline"> 
                        <h3 class="text-lg font-semibold">{{ htmlspecialchars($category->name) }}</h3>
                    </a>
                </div>
             @endforeach
            </div>
            <p class="mt-20">
                <a href="{{ route("categories.create") }}" class="text-white font-semibold hover:underline rounded border-gray-200 bg-purple-800 px-4 py-3 sm:px-6">Create a new category</a>
            </p>
        </div> 
</main>

</div>

{{-- pagination --}}
<div class="flex items-center justify-between border-t border-gray-200 bg-{{ bgColor() }}-200 px-4 py-3 sm:px-6"
<nav class="isolate inline-flex ml-6 rounded-md shadow-sm">
    {{ $categories->links() }}
</nav>
</div>

</body>

</html>