@extends('admin.layout')



@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin.series.index')}}">Series</a>
    </li>
</ol>
<h1>Series List</h1>
<hr>	
@include('admin.global-partials.system-messages')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Series list

        <div class="btn-group btn-group-sm float-right">
            <a class="btn btn-secondary" href="{{route('admin.series.add')}}">
                <i class="fa fa-plus"></i>
                Add New Series
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        

                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($series as $oneSeries)
                    <tr>

                        <td>{{$oneSeries->id}}</td>
                        <td id="tag-title">{{$oneSeries->series_name}}</td>
                        
                        

                        <td>
                            <div class="btn-group">
                                <a class="btn btn-secondary" href="{{route('admin.series.edit', ['id' => $oneSeries->id])}}" title="edit"><i class="fa fa-pencil"></i></a>
                                <button 
                                    class="btn btn-secondary" 
                                    title="delete" 
                                    data-action="delete"
                                    data-id="{{$oneSeries->id}}"
                                    data-title="{{$oneSeries->title}}"
                                    >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<form action="{{route('admin.series.delete')}}" method="post" class="modal fade" id="delete-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
    {{csrf_field()}}
    <input type="hidden" name="id" value="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="tag-title" class="modal-body">
                Are you sure you want to delete team?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</form>

@endsection

@push('footer_js')
<script>

    $('[data-action="delete"]').on('click', function (e) {

        e.preventDefault();

        var target = $(this);

        var id = target.attr('data-id');

        var title = target.attr('data-title');

        $('div.modal-body').html("<p> Are you sure you want to delete team: " + id + " - " + title + "?</p>");
    
        var deletePopup = $('#delete-record-modal');

        deletePopup.find('[name="id"]').val(id);

        deletePopup.modal('show');


    });


</script>
@endpush