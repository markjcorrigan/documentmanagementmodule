@extends('admin.admin_dashboard')
@section('admin')
    {{-- Add custom pagination styling --}}
    <style>
        .pagination {
            margin-top: 20px;
        }
        .pagination .page-link {
            color: #ffffff !important;
            background-color: #6571ff !important;
            border: 1px solid #6571ff !important;
            padding: 8px 16px;
            margin: 0 4px;
            border-radius: 4px;
        }
        .pagination .page-link:hover {
            background-color: #4c5fd8 !important;
            border-color: #4c5fd8 !important;
        }
        .pagination .page-item.active .page-link {
            background-color: #2ecc71 !important;
            border-color: #2ecc71 !important;
            color: #ffffff !important;
        }
        .pagination .page-item.disabled .page-link {
            background-color: #cccccc !important;
            border-color: #cccccc !important;
            color: #666666 !important;
        }
    </style>

    <div class="container mt-4">

        <h2 class="mb-4">All Services</h2>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('all.services') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <select name="category" class="form-control" onchange="this.form.submit()">
                        <option value="">-- All Categories --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ $selectedCategory == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        <!-- Services Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>Service Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{ $service->service_title }}</td>
                    <td>{{ $service->category }}</td>
                    <td>{{ Str::limit($service->service_description, 50) }}</td>
                    <td>{{ $service->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('edit.service', $service->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ route('delete.service', $service->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No services found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
