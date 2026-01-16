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
<h6 class="card-title">All Comments </h6>

<div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
      <tr>
        <th>Serial No:</th>
        <th>Post Title</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>Comment</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($comments as $key => $comment)
        <tr>
            <td>{{ $key+1 }}</td>
            <td> {!! Str::wordWrap($comment['post']['post_title'], 20, '<br />') !!} </td>
            <td>{{ $comment->user_name }}</td>
            <td>{{ $comment->user_email }}</td>
            <td>{!! Str::wordWrap($comment->comment, 40, '<br />') !!}</td>
            <td>
                <div class="form-check form-switch mb-2">
                    <input type="checkbox" class="form-check-input status-button" data-comment-id="{{ $comment->id }}" {{ $comment->status ? 'checked' : '' }}>
                </div>
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

<script>
    $(document).on('change', '.status-button', function(){
        let comment_id = $(this).data('comment-id');
        let is_checked = $(this).is(':checked');
        console.log('Comment ID: ' + comment_id);
        console.log('Status: ' + is_checked);
        // Send an ajax request to activate or deactivate a comment
        $.ajax({
            url: "{{ route('comment.status.update') }}",
            method: "POST",
            data: {_token:"{{ csrf_token() }}", comment_id:comment_id, status:is_checked ? 1 : 0},
            dataType: "json",
            success: function(result){
                console.log('AJAX request successful');
                console.log(result);
                if(result.status == 200){
                    toastr.success('Comment status updated successfully!');
                }
            },
            error: function(xhr, status, error){
                console.log('AJAX request failed');
                console.log(xhr.responseText);
            }
        });
    });

</script>


@endsection

