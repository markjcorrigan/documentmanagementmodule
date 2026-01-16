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

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h6 class="card-title">My Skills</h6>

<div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
      <tr>
        <th>Serial No:</th>
        <th>Icon</th>
        <th>Technology Name</th>
        <th>Experience Level</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($allSkills as $key => $skill)
            <tr>
                <td>{{ $key+1 }}</td>
                <td> <img src="{{ asset($skill->icon) }}" alt=""> </td>
                <td>{{ Str::title($skill->technology_name) }}</td>
                <td>{{ $skill->exp_level }}</td>
                <td>
                    <a href="{{ route('edit.skill', [$skill->id]) }}"  class="btn btn-inverse-light" style="margin-right: 10px;">Edit</a>
                    <a href="{{ route('delete.skill', [$skill->id]) }}" id="delete"  class="btn btn-inverse-danger">Delete</a>
                </td>
           </tr>
        @endforeach

    </tbody>
  </table>
</div>
</div>
</div>
    </div>
</div>

@endsection

