@include('partials.head')
@include('partials.nav')
@include('partials.banner')

<main>
   <div class="mt-5 md:col-span-2 md:mt-0">
     <form action="{{ route('notes.store') }}" method="POST">
       @csrf
       <div class="shadow sm:overflow-hidden sm:rounded-md">
         <div class="space-y-6 bg-gray-100 px-4 py-5 sm:p-6">
           <div class="grid grid-cols-3 gap-6">
             <div class="col-span-3 sm:col-span-2">
               <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Give your note a title:</label>
               <div class="mt-2 flex rounded-md shadow-sm">
                 <input type="text" name="title" id="title" class="block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-yellow-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Make it short and sweet, unlike this placeholder text" required>
                 <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                 <input type="hidden" name="important" value="0">
               </div>
             </div>
           </div>
           <div>
             <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Enter your note:</label>
             <div class="mt-2">
               <textarea name="body" id="body" cols="40" rows="10" class="mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6" required></textarea>
               <select name="category_id" class="block py-2 px-3 mt-6 w-1/2 m-auto border border-gray-400 rounded shadow">
                 <option value="">Select a category for the note</option>
                 @foreach($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach
               </select>
             </div>
             <div class="px-4 py-3 text-right sm:px-6">
               <p><button type="submit" class="inline-flex justify-center rounded-md bg-yellow-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Create</button></p>
             </div>
           </div>
         </div>
      </div>      
     </form>

    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
   </div>
</main>

@include('partials.foot')
