<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * List uploaded images (uploads page)
     */
    public function uploads(Request $request)
    {
        $query = Image::query();
        $searchTerm = '';

        // Add search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%")
                    ->orWhere('shortname', 'like', "%{$searchTerm}%");
            });
        }

        $images = $query->paginate(20);

        // Append search parameter to pagination links
        if ($searchTerm) {
            $images->appends(['search' => $searchTerm]);
        }

        return view('images.uploads', compact('images', 'searchTerm'));
    }

    /**
     * List images (images page)
     */
    public function images(Request $request)
    {
        $query = Image::query();
        $searchTerm = '';

        // Add search functionality
        if ($request->has('query') && !empty($request->query)) {
            $searchTerm = $request->query;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%")
                    ->orWhere('shortname', 'like', "%{$searchTerm}%");
            });
        }

        $images = $query->paginate(20);

        // Append search parameter to pagination links
        if ($searchTerm) {
            $images->appends(['query' => $searchTerm]);
        }

        return view('images.index', compact('images', 'searchTerm'));
    }

    /**
     * Upload a new image to storage/assets
     */
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:' . implode(',', array_keys(Image::mimeTypes())) . '|max:204800',
            'description' => 'nullable|string',
        ]);

        $file = $request->file('image');
        $originalName = $file->getClientOriginalName();

        // Save to storage/app/public/assets
        $destinationPath = storage_path('app/public/images/');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        $file->move($destinationPath, $originalName);

        $shortName = substr(preg_replace('/[\(\[].*?[\)\]]/', '', str_replace(' ', '', $originalName)), 0, 30);
        $description = $request->input('description', $shortName);
        $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        Image::create([
            'name' => $originalName,
            'shortname' => $shortName,
            'path' => 'storage/images/' . $originalName,
            'description' => $description,
            'extension' => $ext,
        ]);

        return redirect()->route('image-uploading')->with('success', 'Image uploaded successfully!');
    }

    /**
     * Download a image by shortname
     */
    public function downloadByShortName($shortname)
    {
        $image = Image::where('shortname', $shortname)->firstOrFail();
        $fullPath = storage_path('app/public/images/' . $image->name);

        if (!file_exists($fullPath)) {
            abort(404);
        }

        return response()->download($fullPath);
    }

    /**
     * Download a image by ID
     */
    public function downloadById($id)
    {
        $image = Image::findOrFail($id);
        $fullPath = storage_path('app/public/images/' . $image->name);

        if (!file_exists($fullPath)) {
            abort(404);
        }

        return response()->download($fullPath);
    }

    /**
     * Edit image metadata
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);

        return view('images.edit', compact('image'));
    }

    /**
     * Update image metadata
     */
    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'shortname' => 'required',
            'description' => 'nullable|string',
        ]);

        $image->name = $request->name;
        $image->shortname = $request->shortname;
        $image->description = $request->input('description', $image->description);
        $image->save();

        return redirect()->route('image-uploading')->with('success', 'Image updated successfully!');
    }

    /**
     * Delete a image
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $fullPath = storage_path('app/public/images/' . $image->name);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }

        $image->delete();

        return redirect()->route('image-uploading')->with('success', 'Image deleted successfully!');
    }

    /**
     * Search images (API endpoint)
     */
    public function search($term)
    {
        $images = Image::where('name', 'like', "%{$term}%")
            ->orWhere('description', 'like', "%{$term}%")
            ->paginate(20);

        return response()->json($images);
    }
}