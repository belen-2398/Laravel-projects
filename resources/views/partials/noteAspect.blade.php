<div class="bg-{{ noteBgColor($index) }}-200 rounded-lg shadow-md p-6 hover:bg-{{ noteBgColor($index) }}-300 h-4/4 w-4/4 relative">
    {{-- star --}}
    <form action="{{ route('notes.toggleImportant', $note) }}" method="POST" class="absolute top-0 right-0 mt-2 mr-2">
        @csrf
        @method('PUT')
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 2.5l1.902 5.376 5.998 0.33-4.572 3.964 1.493 5.915-4.821-3.399-4.821 3.399 1.493-5.915L4.1 8.206l5.998-.33L12 2.5z" stroke-linejoin="round" stroke-width="2" stroke="currentColor" fill="{{ $note->important ? 'currentColor' : 'none' }}" />
            </svg>
        </button>
    </form>

    <p class="absolute top-0 left-1 mt-2 ml-2 text-gray-600"> {{ $note->updated_at->format('d M') }} </p>  

    <a href="{{ route('notes.show', $note) }}" class="text-blue-800 hover:underline mb-2 block"> 
        <h3 class="text-lg font-semibold mt-2">{{ htmlspecialchars($note->title) }}</h3>
    </a>
    <p class="m-2">{{ Str::limit($note->body, 50, '...') }}</p>
    
    <div class="pt-12 p-4">
            @if ($note->category)<p class= "absolute bottom-2 left-4 right-2 text-gray-600"> Cat.: "{{ $note->category->name }}". </p>@endif
    </div> 
</div>