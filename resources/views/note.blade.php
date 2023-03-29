
@include('partials.head')
@include('partials.nav')
@include('partials.banner')

<main>
    

    <div class="flex-grow p-6">

        @if($note->category)
        <div class="mb-2">
            <p class="font-bold inline">Category:</p>
            <p class= "inline"> {{ $note->category->name }}</p>
        </div>
        
        @else
         <p>This note doesn't belong to a category yet.</p>
        @endif

        <p class="flex bg-white p-5 rounded">{{ $note->body }}</p>
        

        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?')">
            <a href="{{ route("notes.edit", $note->id) }}" class="text-white inline-block font-semibold hover:underline rounded px-4 py-3 sm:px-6 bg-yellow-500 m-2 ml-6">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class= "text-white inline-block font-semibold hover:underline rounded px-4 py-3 sm:px-6 bg-red-800">Delete</button>
        </form>
    </div>
</main>

@include('partials.foot')
