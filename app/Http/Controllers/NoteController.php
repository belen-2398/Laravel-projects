<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{

    public function index(Request $request)
    {
        $notes = Note::where('user_id', Auth::id())
            ->when($request->input('search'), function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('body', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        $noteCount = count($notes);
        $message = $noteCount === 0 ? ($request->has('search') ? 'No results for the search' : 'Sorry, you have no notes yet') : '';
        $heading = $noteCount === 0 ? $message : 'Your notes';

        $categories = Category::where('user_id', Auth::id())->get();

        return view('notes', ['heading' => $heading, "message" => $message], compact('notes', 'noteCount', 'categories'));
    }

    public function create()
    {
        $note = new Note();
        $note->category_id = null;
        $categories = Category::where('user_id', Auth::id())->get();

        return view('notes.create', ['heading' =>  'Create a new note'], compact('note', 'categories'));
    }

    public function store(Request $request)
    {
        request()->validate(Note::$rules);

        $note = Note::create($request->post());

        $note->category_id = $request->input('category_id');

        return redirect()->route('notes.index')
            ->with('success', 'Note created successfully.');
    }

    public function show(Note $note)
    {
        $categories = Category::where('user_id', Auth::id())->get();

        return view('note', ['heading' => $note->title], compact('note', 'categories'));
    }

    public function edit(Note $note)
    {

        $categories = Category::where('user_id', Auth::id())->get();

        return view('notes.edit', ['heading' => 'Edit your note'], compact('note', 'categories'));
    }

    public function update(Request $request, Note $note)
    {
        request()->validate(Note::$rules);

        $note->update($request->all());

        return redirect()->route('notes.show', $note)
            ->with('success', 'Note updated successfully');
    }

    public function destroy(Note $note)
    {

        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Note deleted successfully.');
    }

    public function toggleImportant(Note $note)
    {
        $note->update([
            'important' => !$note->important,
        ]);

        return back();
    }
}
