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
                    {{-- /portfolio --}}
                    <h6 class="card-title">All Contacts from Portfolio page contact for at bottom</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>Serial No:</th>
                                <th>Client's Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Service Needed</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contactMessages as $key => $contact)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td> {{ Str::title($contact->first_name) }} {{ Str::title($contact->last_name) }} </td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>
                                        @php
                                            $serviceIds = json_decode($contact->selected_services);
                                            $serviceNames = [];

                                            if (!empty($serviceIds) && is_array($serviceIds)) {
                                                foreach ($serviceIds as $serviceId) {
                                                    $service = App\Models\Service::find($serviceId);
                                                    if ($service) {
                                                        $serviceNames[] = $service->service_title;
                                                    }
                                                }
                                            }

                                            if (empty($serviceNames)) {
                                                echo 'N/A';
                                            } else {
                                                echo implode('<br>', $serviceNames);
                                            }
                                        @endphp
                                    </td>
                                    <td>{!! Str::wordWrap($contact->description, 20, '<br />') !!}</td>
                                    <td>
                                        <a href="{{ route('delete.contact', [$contact->id]) }}" id="delete" class="btn btn-inverse-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="mt-3">
                            {{ $contactMessages->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection