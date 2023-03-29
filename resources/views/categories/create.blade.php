@include('partials.head')
@include('partials.nav')
@include('partials.banner')

<main>
   <div class="mt-5 md:col-span-2 md:mt-0">
   <form action="{{ route('categories.store') }}" method="POST">
      @csrf
      <div class="shadow sm:overflow-hidden sm:rounded-md">
         <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
           <div class="grid grid-cols-3 gap-6">
             <div class="col-span-3 sm:col-span-2">
         <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Give your category a name:</label>
         <div class="mt-2 flex rounded-md shadow-sm">
         <input type="string" name="name" id="name" class="block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-yellow-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-4" placeholder="Make it short and sweet, unlike this placeholder text" required>
         <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
      </div>
   </div>
 </div>
<div>
         <p class="block text-sm font-medium leading-6 text-gray-900">Select any notes that belong to this category:</p>
         <div class="mt-2 grid grid-cols-4 gap-4">
            @foreach ($notes->whereNull('category_id') as $note)
               <div>
                  <input type="checkbox" name="notes[]" value="{{ $note->id }}" id="note-{{ $note->id }}" class="focus:ring-yellow-600 h-4 w-4 text-yellow-600 border-gray-300 rounded">
                  <label for="note-{{ $note->id }}" class="ml-2 text-sm text-gray-700">{{ $note->title }}</label>
               </div>
            @endforeach
         </div>
   <div class="px-4 py-3 text-right sm:px-6">
   <p><button type="submit" class="inline-flex justify-center rounded-md bg-yellow-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Create</button></p>

</div>
</div>
</form>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
   </div>

</div>

</div>


</main>

@include('partials.foot')