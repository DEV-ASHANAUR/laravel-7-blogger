@extends('user.layouts.master')
@section('title')
    Manage Comment | User Panel
@endsection
@section('style')
    <style>
        td.action {
            display: inline-flex;
        }
    </style>
@endsection
@section('comment')
    in
@endsection
@section('all-comment')
    active
@endsection
@section('main-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Comment List</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Comment List</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('user.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        @include('backend.layouts.partials.message')
                        <h4 class="header-title float-left">Comment List</h4>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th width="10%">SL No</th>
                                        <th width="20%">Comment</th>
                                        <th width="10%">User</th>
                                        <th width="30%">Post</th>
                                        <th width="20%">Created At</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $key => $comment)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td class="text-capitalize">{{ $comment->comment }}</td>
                                        <td>
                                            @if (!empty($comment->user_id))
                                                {{ $comment->user->name }}
                                            @else
                                                {{ $comment->admin->name }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('post',$comment->post->slug) }}" target="_blank">{{ $comment->post->title }}</a>
                                            </td>
                                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                                       
                                        <td>
                                           
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-{{ $comment->id }}"><i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- --------modal start------------ --}}
                    
                    @foreach ($comments as $key => $comment)
                    {{-- category category modal start --}}
                    
                    <div class="modal fade bd-example-modal-sm" id="delete-{{ $comment->id }}">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Comment</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Are You Sure ! Delete This Comment?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cancle</button>

                                    <button type="button" class="btn btn-danger btn-flat" onclick="event.preventDefault();
                                    document.getElementById('deleteCom-{{$comment->id}}').submit();">Delete</button>
                                    <form action="{{ route('user.comment.destroy',$comment->id) }}" style="display: none" id="deleteCom-{{$comment->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- --------modal end------------ --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#Myform_category + img').remove();
            $('#test-img').html('<img class="img-fluid img-thumbnail" src="'+e.target.result+'" width="80px" height="80px" />');
        }
        reader.readAsDataURL(input.files[0]);
        }
        }
        $("#file-img").change(function () {
            filePreview(this);
        });
</script>
<script>
    $(document).ready(function(){
        $('#picture').click(function(){
            $('#test-img').html('');
        });
    });
</script>
@endsection