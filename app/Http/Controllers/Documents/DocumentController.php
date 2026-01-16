<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Http\Requests\Documents\StoreDocumentRequest;
use App\Http\Requests\Documents\UpdateDocumentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Apply permission middleware only to management methods
     * Viewing and downloading are open to all authenticated users
     */
    public function __construct()
    {
        $this->middleware('permission:manage assets')->except(['index', 'show', 'download', 'downloadByShortName']);
    }

    /**
     * Display a listing of the documents
     */
    public function index()
    {
        return view('documents.index');
    }

    /**
     * Show the form for creating a new document
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created document in storage
     */
    public function store(StoreDocumentRequest $request)
    {
        $validated = $request->validated();
        
        // Handle file upload
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $originalName = $file->getClientOriginalName();
            
            // Save to storage/app/public/assets
            $destinationPath = storage_path('app/public/assets');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $originalName);
            
            $shortName = substr(preg_replace('/[\(\[].*?[\)\]]/', '', str_replace(' ', '', $originalName)), 0, 30);
            $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            
            Document::create([
                'name' => $originalName,
                'shortname' => $validated['shortname'] ?? $shortName,
                'path' => 'storage/assets/' . $originalName,
                'description' => $validated['description'] ?? $shortName,
                'extension' => $ext,
            ]);
        }

        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully!');
    }

    /**
     * Display the specified document
     */
    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified document
     */
    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified document in storage
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $validated = $request->validated();
        
        // Handle file replacement if new file uploaded
        if ($request->hasFile('document')) {
            // Delete old file
            $oldPath = storage_path('app/public/assets/' . $document->name);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            
            // Upload new file
            $file = $request->file('document');
            $originalName = $file->getClientOriginalName();
            
            $destinationPath = storage_path('app/public/assets');
            $file->move($destinationPath, $originalName);
            
            $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            
            $validated['name'] = $originalName;
            $validated['path'] = 'storage/assets/' . $originalName;
            $validated['extension'] = $ext;
        }
        
        $document->update($validated);

        return redirect()->route('documents.index')->with('success', 'Document updated successfully!');
    }

    /**
     * Remove the specified document from storage (soft delete)
     */
    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document moved to trash successfully!');
    }

    /**
     * Display trashed documents
     */
    public function trashed()
    {
        return view('documents.trashed');
    }

    /**
     * Restore a trashed document
     */
    public function restore($id)
    {
        $document = Document::withTrashed()->findOrFail($id);
        $document->restore();

        return redirect()->route('documents.trashed')->with('success', 'Document restored successfully!');
    }

    /**
     * Permanently delete a document (hard delete)
     */
    public function forceDelete($id)
    {
        $document = Document::withTrashed()->findOrFail($id);
        
        // Delete physical file
        $fullPath = storage_path('app/public/assets/' . $document->name);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
        
        $document->forceDelete();

        return redirect()->route('documents.trashed')->with('success', 'Document permanently deleted!');
    }

    /**
     * Download a document by ID
     */
    public function download(Document $document)
    {
        $fullPath = storage_path('app/public/assets/' . $document->name);

        if (!file_exists($fullPath)) {
            abort(404);
        }

        return response()->download($fullPath);
    }

    /**
     * Download a document by shortname (legacy support)
     */
    public function downloadByShortName($shortname)
    {
        $document = Document::where('shortname', $shortname)->firstOrFail();
        $fullPath = storage_path('app/public/assets/' . $document->name);

        if (!file_exists($fullPath)) {
            abort(404);
        }

        return response()->download($fullPath);
    }
}