@extends('admin.admin_dashboard')
@section('admin')

    @php
        use Spatie\Permission\Models\Role;
        use Illuminate\Support\Facades\Auth;

        $admin = Role::findByName('super admin')->users->first();
    //    dd($admin);
    //dd($admin->name);
    @endphp

<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="position-relative">
          <figure class="overflow-hidden mb-0 d-flex justify-content-center">
            <img src="{{ asset('../../../backend/assets/images/pbg.jpg') }}
            " class="rounded-top" alt="profile cover" style="width: 100%; height: 200px">
          </figure>
          <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
            <div>
              <img class="wd-70 rounded-circle" src="{{ $admin->photo ? asset($admin->photo) : asset('uploads/no-img-avatar.png') }}" alt="profile">
              <span class="h4 ms-3 text-light">{{ $admin->name }}</span>
            </div>
            <div class="d-none d-md-block">
              <a href="{{ route('admin.edit.profile') }}" class="btn btn-primary btn-icon-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit btn-icon-prepend"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit profile
              </a>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center p-3 rounded-bottom">
          <ul class="d-flex align-items-center m-0 p-0">
            <li class="d-flex align-items-center active">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns me-1 icon-md text-primary"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
              <a class="pt-1px d-none d-md-block text-primary" href="#">Timeline</a>
            </li>
            <li class="ms-3 ps-3 border-start d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user me-1 icon-md"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
              <a class="pt-1px d-none d-md-block text-body" href="#">About</a>
            </li>
            <li class="ms-3 ps-3 border-start d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users me-1 icon-md"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              <a class="pt-1px d-none d-md-block text-body" href="#">Friends <span class="text-muted tx-12">3,765</span></a>
            </li>
            <li class="ms-3 ps-3 border-start d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image me-1 icon-md"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
              <a class="pt-1px d-none d-md-block text-body" href="#">Photos</a>
            </li>
            <li class="ms-3 ps-3 border-start d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video me-1 icon-md"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
              <a class="pt-1px d-none d-md-block text-body" href="#">Videos</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

@endsection
