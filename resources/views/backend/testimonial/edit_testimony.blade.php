@extends('admin.admin_dashboard')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">Edit Testimony </h6>

            <form class="forms-sample" method="POST" action="{{ route('update.testimony') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $testimony->id }}">
                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="{{ $testimony->name }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Occupation </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="occupation" value="{{ $testimony->occupation }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Testimony </label>
                    <div class="col-sm-9">
                        <textarea class="form-control" required name="testimony" rows="3" placeholder="Message....">
                            {{ $testimony->testimony }}
                        </textarea>
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
                        <img id="ShowImage" src="{{ $testimony->photo ? asset($testimony->photo) : asset('uploads/no_image.jpg') }}" alt="" style="width: 90px; height: 90px">
                    </div>
                </div>
            
                <button type="submit" class="btn btn-secondary">Update Testimony</button>
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


