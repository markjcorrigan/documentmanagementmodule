@extends('admin.admin_dashboard')
@section('admin')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">Edit Skill </h6>

            <form class="forms-sample" method="POST" action="{{ route('update.skill') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $skill->id }}">
                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Technology Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="technology" value="{{ $skill->technology_name }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Experience Level </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="exp_level" value="{{ $skill->exp_level }}">
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Icon</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="icon" type="file" id="Image">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <img id="ShowImage" src="{{ asset($skill->icon) }}" alt="" style="width: 90px; height: 90px">
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary">Update Skill</button>
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


