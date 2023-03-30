    <div class="flex justify-between mb-4">
        <div class="inline-block">
         <label for="sort">Sort by:</label>
         <select id="sort" name="sort" class="ml-2 border border-gray-300 rounded px-2 py-1">
            <option value="title_asc" {{ $sort === 'title_asc' ? 'selected' : '' }}>Title (A-Z)</option>
            <option value="title_desc" {{ $sort === 'title_desc' ? 'selected' : '' }}>Title (Z-A)</option>
            <option value="created_at_asc" {{ $sort === 'created_at_asc' ? 'selected' : '' }}>Date of creation (oldest first)</option>
            <option value="created_at_desc" {{ $sort === 'created_at_desc' ? 'selected' : '' }}>Date of creation (newest first)</option>
            <option value="updated_at_asc" {{ $sort === 'updated_at_asc' ? 'selected' : '' }}>Date of update (oldest first)</option>
            <option value="updated_at_desc" {{ $sort === 'updated_at_desc' ? 'selected' : '' }}>Date of update (newest first)</option>
            <option value="important" {{ $sort === 'important' ? 'selected' : '' }}>Show important only</option>
         </select>
         <button class="text-white font-semibold rounded bg-yellow-800 px-4 py-2 sm:px-6">Apply</button>
        </div>
    </div>
</form>