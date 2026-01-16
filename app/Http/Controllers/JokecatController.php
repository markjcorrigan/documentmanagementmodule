<?php

namespace App\Http\Controllers;

use App\Models\Jokecat;
use Illuminate\Http\Request;

class JokecatController extends Controller
{
    /**
     * Display a listing of joke categories
     */
    public function index(Request $request)
    {
        $query = Jokecat::select([
            'jokecats.*',
            \DB::raw('(SELECT COUNT(*) FROM jokes WHERE jokes.jokecat_id = jokecats.id) as jokes_count'),
        ]);

        // Search functionality
        if ($request->has('s') && $request->s) {
            $query->where('name', 'like', "%{$request->s}%");
        }

        $jokecats = $query->paginate(10);

        return view('jokecats.index', compact('jokecats'));
    }

    /**
     * Show the form for creating a new category
     */
    public function create()
    {
        return view('jokecats.create');
    }

    /**
     * Store a newly created category
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Jokecat::create($validated);

        return redirect()->route('jokecats.index')
            ->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified category
     */
    public function edit(Jokecat $jokecat)
    {
        return view('jokecats.edit', compact('jokecat'));
    }

    /**
     * Update the specified category
     */
    public function update(Request $request, Jokecat $jokecat)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $jokecat->update($validated);

        return redirect()->route('jokecats.index')
            ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified category
     */
    public function destroy(Jokecat $jokecat)
    {
        // Check if category has jokes
        if ($jokecat->jokes()->count() > 0) {
            return back()->with('error', 'Cannot delete category with existing jokes!');
        }

        $jokecat->delete();

        if (request()->ajax()) {
            return response()->json(['message' => 'Category deleted successfully']);
        }

        return redirect()->route('jokecats.index')
            ->with('success', 'Category deleted successfully!');
    }
}
