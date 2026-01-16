@extends('admin.admin_dashboard')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">Edit Work </h6>

            <form class="forms-sample" method="POST" action="{{ route('update.work') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="work_id" value="{{ $work->id }}">
                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Category</label>
                    <div class="col-sm-9">
                        <select name="service_cat" class="form-select mb-3">
                            <option selected="">Select Service Category</option>

                            @foreach ($services as $service)
                                <option {{ $work->service_cat_id == $service->id ? 'selected' : '' }} value="{{$service->id}}">{{$service->service_title}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" value="{{ $work->title }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sub Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="sub_title" value="{{ $work->sub_title }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Url</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="url" value="{{ $work->url }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Photo</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="photo" type="file" id="Image">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <img id="ShowImage" src="{{ $work->photo ? asset($work->photo) : asset('uploads/no_image.jpg') }}" alt="" style="width: 90px; height: 90px">
                    </div>
                </div>
            
                <button type="submit" class="btn btn-secondary">Update Work</button>
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


