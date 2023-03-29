@include('partials.head')
@include('partials.nav')
@include('partials.banner')

<main class="flex">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        @if (empty($message)) @endif
        <div class="grid grid-cols-4 gap-4 pr-6"> 
            @foreach ($notes as $index => $note)
            @include('partials.noteAspect')
            @endforeach
        </div>
        <p class="mt-20">
            <a href="{{ route("notes.create") }}" class="text-white font-semibold hover:underline rounded border-gray-200 bg-yellow-800 px-4 py-3 sm:px-6">Create a new note</a>
        </p>
    </div>
   
    @include('partials.sidebar')
</main>

</div>

{{-- pagination --}}
<div class="flex items-center justify-between border-t border-gray-200 bg-{{ bgColor() }}-200 px-4 py-3 sm:px-6"
<nav class="isolate inline-flex ml-6 rounded-md shadow-sm">
    {{ $notes->links() }}
</nav>

@include('partials.foot')