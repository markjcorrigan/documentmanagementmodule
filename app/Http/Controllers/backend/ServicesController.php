<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    /**
     * Display all services with optional category filtering
     */
    public function AllServices(Request $request)
    {
        // Get all unique categories for the dropdown
        $categories = Service::select('category')->distinct()->pluck('category');
        $selectedCategory = $request->get('category');

        // Filter services by category if selected
        $services = Service::when($selectedCategory, function ($query) use ($selectedCategory) {
            $query->where('category', $selectedCategory);
        })
            ->latest()
            ->get();

        return view('backend.services.all_services', compact('services', 'categories', 'selectedCategory'));
    }

    /**
     * Show form to add a new service
     */
    public function AddService()
    {
        $categories = Service::select('category')->distinct()->get();

        return view('backend.services.add_service', compact('categories'));
    }

    /**
     * Store a new service
     */
    public function StoreService(Request $request)
    {
        $request->validate([
            'service_title' => 'required|string|max:255',
            'service_description' => 'nullable|string',
        ]);

        // Handle category logic (inline new category support)
        $category = $request->category;
        if ($category === '__new__' && ! empty($request->new_category)) {
            $category = trim(Str::title($request->new_category));
        }

        $service = new Service;
        $service->service_title = Str::replace('/', '-', $request->service_title);
        $service->service_description = $request->service_description;
        $service->category = $category ?: 'Uncategorized';
        $service->created_at = Carbon::now();
        $service->save();

        $notification = [
            'message' => 'Service Added Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.services')->with($notification);
    }

    /**
     * Show form to edit a service
     */
    public function EditService($id)
    {
        $service = Service::findOrFail($id);
        $categories = Service::select('category')->distinct()->get();

        return view('backend.services.edit_service', compact('service', 'categories'));
    }

    /**
     * Update existing service
     */
    public function UpdateService(Request $request)
    {
        $request->validate([
            'service_title' => 'required|string|max:255',
            'service_description' => 'nullable|string',
        ]);

        $service = Service::findOrFail($request->service_id);

        // Handle category logic (inline new category support)
        $category = $request->category;
        if ($category === '__new__' && ! empty($request->new_category)) {
            $category = trim(Str::title($request->new_category));
        }

        $service->service_title = Str::replace('/', '-', $request->service_title);
        $service->service_description = $request->service_description;
        $service->category = $category ?: 'Uncategorized';
        $service->updated_at = Carbon::now();
        $service->save();

        $notification = [
            'message' => 'Service Updated Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->route('all.services')->with($notification);
    }

    /**
     * Delete a service
     */
    public function DeleteService($id)
    {
        Service::findOrFail($id)->delete();

        $notification = [
            'message' => 'Service Deleted Successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Manage categories as a separate list
     */
    public function AllCategories()
    {
        // Get unique categories from services table
        $categories = Service::select('category')->distinct()->get();

        return view('backend.services.all_categories', compact('categories'));
    }

    /**
     * Add a new category (creates placeholder service)
     */
    public function AddCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:services,category',
        ]);

        // Add a placeholder service for the new category
        $service = new Service;
        $service->service_title = 'New Service';
        $service->service_description = 'Description pending';
        $service->category = trim(Str::title($request->category_name));
        $service->created_at = Carbon::now();
        $service->save();

        $notification = [
            'message' => 'Category Added Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Delete all services under a category
     */
    public function DeleteCategory($category_name)
    {
        Service::where('category', $category_name)->delete();

        $notification = [
            'message' => 'Category and all associated services deleted successfully!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }
}
