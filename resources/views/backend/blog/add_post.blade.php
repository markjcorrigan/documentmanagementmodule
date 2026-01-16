@extends('admin.admin_dashboard')
@section('admin')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Add Post </h6>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="forms-sample" method="POST" action="{{ route('store.post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="post_title" class="col-sm-3 col-form-label">Post Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('post_title') is-invalid @enderror"
                                   name="post_title" placeholder="Post Title" value="{{ old('post_title') }}" required>
                            @error('post_title')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="post_tags" class="col-sm-3 col-form-label">Post Tags <br>(CSV: Comma Separated
                            Values)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('post_tags') is-invalid @enderror"
                                   name="post_tags" placeholder="Tag1, Tag2 etc." value="{{ old('post_tags') }}" required>
                            @error('post_tags')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="post_description" class="col-sm-3 col-form-label">Post Content</label>
                        <div class="col-sm-9">
                        <textarea class="form-control @error('post_description') is-invalid @enderror"
                                  name="post_description" rows="10">{{ old('post_description') }}</textarea>
                            @error('post_description')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="photo" class="col-sm-3 col-form-label">Post Photo</label>
                        <div class="col-sm-9">
                            <input class="form-control @error('photo') is-invalid @enderror" name="photo" type="file"
                                   id="Image" required
                                   accept=".jpg,.jpeg,.png,.gif,.svg,.webp,.bmp,.ico,.tiff">
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                            <small class="text-muted">Accepted formats: JPG, JPEG, PNG, GIF, SVG, WebP, BMP, ICO, TIFF (Max: 5MB)</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <img id="ShowImage" src="{{ url('storage/images/blogpostimage_no-img.jpg') }}" alt=""
                                 style="width: 90px; height: 90px">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Add Post</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#Image').on('change', function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#ShowImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        })
    </script>
@endsection


{{--@extends('admin.admin_dashboard')--}}
{{--@section('admin')--}}
{{--<div class="col-md-12 grid-margin stretch-card">--}}
{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
{{--            <h6 class="card-title">Add Post </h6>--}}


{{--            --}}{{-- @if ($errors->any())--}}
{{--            --}}{{-- <div class="alert alert-danger">--}}
{{--                --}}{{-- <ul>--}}
{{--                    --}}{{-- @foreach ($errors->all() as $error)--}}
{{--                    --}}{{-- <li>{{ $error }}</li>--}}
{{--                    --}}{{-- @endforeach--}}
{{--                    --}}{{-- </ul>--}}
{{--                --}}{{-- </div>--}}
{{--            --}}{{-- @endif--}}



{{--            <form class="forms-sample" method="POST" action="{{ route('store.post') }}" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="row mb-3">--}}
{{--                    <label for="post_title" class="col-sm-3 col-form-label">Post Title</label>--}}
{{--                    <div class="col-sm-9">--}}
{{--                        <input type="text" class="form-control @error('post_title') is-invalid @enderror"--}}
{{--                            name="post_title" placeholder="Post Title" value="{{ old('post_title') }}" required>--}}
{{--                        @error('post_title')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row mb-3">--}}
{{--                    <label for="post_tags" class="col-sm-3 col-form-label">Post Tags <br>(CSV: Comma Separated--}}
{{--                        Values)</label>--}}
{{--                    <div class="col-sm-9">--}}
{{--                        <input type="text" class="form-control @error('post_tags') is-invalid @enderror"--}}
{{--                            name="post_tags" placeholder="Tag1, Tag2 etc." value="{{ old('post_tags') }}" required>--}}
{{--                        @error('post_tags')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row mb-3">--}}
{{--                    <label for="post_description" class="col-sm-3 col-form-label">Post Content</label>--}}
{{--                    <div class="col-sm-9">--}}
{{--                        <textarea class="form-control @error('post_description') is-invalid @enderror"--}}
{{--                            name="post_description" rows="10">{{ old('post_description') }}</textarea>--}}
{{--                        @error('post_description')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="row mb-3">--}}
{{--                    <label for="photo" class="col-sm-3 col-form-label">Post Photo</label>--}}
{{--                    <div class="col-sm-9">--}}
{{--                        <input class="form-control @error('photo') is-invalid @enderror" name="photo" type="file"--}}
{{--                            id="Image" required>--}}
{{--                        @error('photo')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="row mb-3">--}}
{{--                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"></label>--}}
{{--                    <div class="col-sm-9">--}}
{{--                        <img id="ShowImage" src="{{ asset('uploads/no_image.jpg') }}" alt=""--}}
{{--                            style="width: 90px; height: 90px">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-secondary">Add Post</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('#Image').on('change', function (e) {--}}
{{--            var reader = new FileReader();--}}
{{--            reader.onload = function (e) {--}}
{{--                $('#ShowImage').attr('src', e.target.result);--}}
{{--            }--}}
{{--            reader.readAsDataURL(e.target.files['0']);--}}
{{--        });--}}
{{--    })--}}
{{--</script>--}}





{{--@endsection--}}
