@extends('admin.admin_dashboard')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">Chnage Password </h6>

            <form class="forms-sample" method="POST" action="{{ route('admin.update.password') }}">
                @csrf
                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Old Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" placeholder="Old Password">
                        @error('old_password')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="New Password">
                        @error('new_password')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Confirm New Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" name="confirm_new_password" placeholder="Confirm New Password">
                        @error('confirm_new_password')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
               
            
                <button type="submit" class="btn btn-secondary">Change Password</button>
            </form>

        </div>
    </div>
</div>


@endsection