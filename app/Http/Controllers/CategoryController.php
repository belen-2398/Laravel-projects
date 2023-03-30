<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('user_id', Auth::id())
            ->when($request->input('search'), function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $categoryCount = count($categories);
        $message = $categoryCount === 0 ? ($request->has('search') ? 'No results for the search' : 'Sorry, you have no categories yet') : '';
        $heading = $categoryCount === 0 ? $message : 'Your categories';

        return view(
            'categories',
            ['heading' => $heading, "message" => $message],
            compact('categories', 'categoryCount')
        );
    }

    public function create()
    {
        $category = new Category();

        $notes = Note::where('user_id', Auth::id())->get();

        return view(
            'categories.create',
            ['heading' =>  'Create a new category'],
            compact('category', 'notes')
        );
    }

    public function store(Request $request)
    {
        request()->validate(Category::$rules);

        $category = Category::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);

        if ($request->has('notes')) {
            $notes = Note::whereIn('id', $request->notes)->get();
            foreach ($notes as $note) {
                $note->update(['category_id' => $category->id]);
            }
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(Category $category, Request $request)
    {
        $sort = $request->input('sort');
        $notes = Note::where('category_id', $category->id)
            ->when($request->input('sort'), function ($query, $sort) {
                switch ($sort) {
                    case 'title_asc':
                        $query->orderBy('title');
                        break;
                    case 'title_desc':
                        $query->orderBy('title', 'desc');
                        break;
                    case 'created_at_asc':
                        $query->orderBy('created_at');
                        break;
                    case 'created_at_desc':
                        $query->orderBy('created_at', 'desc');
                        break;
                    case 'updated_at_asc':
                        $query->orderBy('updated_at');
                        break;
                    case 'updated_at_desc':
                        $query->orderBy('updated_at', 'desc');
                        break;
                    case 'important':
                        $query->where('important', true);
                        break;
                    default:
                        break;
                }
            })
            ->paginate(8);
        return view('categories.show', ['heading' => $category->name], compact('notes', 'category', 'sort'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', ['heading' => 'Edit your category'], compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        request()->validate(Category::$rules);
        $category->fill($request->post())->save();

        return redirect()->route('categories.index')
            ->with('success', 'Note updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Note deleted successfully.');
    }
}
