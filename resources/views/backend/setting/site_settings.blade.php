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

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">Update Site Settings </h6>

            <form class="forms-sample" method="POST" action="{{ route('update.site.settings') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" value="{{ $sData->phone }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email </label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" value="{{ $sData->email }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Address </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" value="{{ $sData->address }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Footer Notes </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="footer_note" value="{{ $sData->footer_note }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Logo</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="logo" type="file" id="Image">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <img id="ShowImage" src="{{ $sData->logo ? asset($sData->logo) : asset('uploads/no_image.jpg') }}" alt="" style="width: 90px; height: 90px">
                    </div>
                </div>
            
                <button type="submit" class="btn btn-secondary">Updated</button>
            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function (){
        $('#Image').on('change', function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#ShowImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    })
</script>

@endsection


