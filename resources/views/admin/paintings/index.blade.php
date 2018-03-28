@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin.paintings.index')}}">Paintings</a>
    </li>
</ol>
<h1>Paintings List</h1>
<hr>			

@include('admin.global-partials.system-messages')

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Paintings list

        <div class="btn-group btn-group-sm float-right">
            <a class="btn btn-secondary" href="{{route('admin.paintings.add')}}">
                <i class="fa fa-plus"></i>
                Add Painting
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="records-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Series Name</th>
                        <th>Painting Name</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Year</th>
                        
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paintings as $painting)
                    <tr>
                        <td>{{$painting->id}}</td>
                        <td>{{optional($painting->series)->series_name}}</td>
                        <td>{{$painting->name}}</td>
                        <td>{{$painting->price}}</td>
                        <td>{{$painting->size}}</td>
                        <td>{{$painting->year}}</td>
                        
                       
                        <td class="text-center">
                            <div class="btn-group">
                                <a 
                                    class="btn btn-secondary"
                                    href="{{route('admin.paintings.edit', ['id' => $painting->id])}}" 
                                    title="edit"
                                    ><i class="fa fa-pencil"></i></a>
                                <button 
                                    class="btn btn-secondary"
                                    title="delete"
                                    data-action="delete"
                                    data-id="{{$painting->id}}"
                                    ><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<form method="post" action="{{route('admin.paintings.delete')}}" class="modal fade" id="delete-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
    {{csrf_field()}}
    <input type="hidden" name="id" value="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Painting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete painting?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('footer_javascript')
<script>
    $('#records-table').on('click', '[data-action="delete"]', function (e) {

        e.preventDefault();

        var target = $(this);

        var id = target.attr('data-id');

        var deletePopup = $('#delete-record-modal');

        deletePopup.find('[name="id"]').val(id);

        deletePopup.modal('show');
    });

</script>
@endpush