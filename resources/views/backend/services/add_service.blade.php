@extends('admin.admin_dashboard')
@section('admin')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Add a Service</h6>

                <form class="forms-sample" method="POST" action="{{ route('store.service') }}">
                    @csrf

                    {{-- Service Title --}}
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Service Title:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="service_title" placeholder="Service Title" required>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Service Description:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="service_description" rows="3" placeholder="Service Description" required></textarea>
                        </div>
                    </div>

                    {{-- Category --}}
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Category:</label>
                        <div class="col-sm-9">
                            <select name="category" id="categorySelect" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->category }}">{{ $cat->category }}</option>
                                @endforeach
                                <option value="__new__">+ Add New Category</option>
                            </select>
                        </div>
                    </div>

                    {{-- New Category Field (hidden by default) --}}
                    <div class="row mb-3" id="newCategoryRow" style="display: none;">
                        <label class="col-sm-3 col-form-label">New Category:</label>
                        <div class="col-sm-9">
                            <input type="text" name="new_category" id="newCategoryInput" class="form-control" placeholder="Enter New Category">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-secondary">Add Service</button>
                </form>

            </div>
        </div>
    </div>

    {{-- Simple Script to toggle new category field --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categorySelect = document.getElementById('categorySelect');
            const newCategoryRow = document.getElementById('newCategoryRow');

            categorySelect.addEventListener('change', function () {
                if (this.value === '__new__') {
                    newCategoryRow.style.display = 'flex';
                    document.getElementById('newCategoryInput').required = true;
                } else {
                    newCategoryRow.style.display = 'none';
                    document.getElementById('newCategoryInput').required = false;
                    document.getElementById('newCategoryInput').value = '';
                }
            });
        });
    </script>

@endsection
