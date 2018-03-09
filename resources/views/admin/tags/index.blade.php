@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.tags.index')}}">Tags</a>
	</li>
</ol>
<h1>Tags List</h1>
<hr>			

@include('admin.global-partials.system-messages')

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Tags list

		<div class="btn-group btn-group-sm float-right">
			<a class="btn btn-secondary" href="{{route('admin.tags.add')}}">
				<i class="fa fa-plus"></i>
				Add Tag
			</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="records-table" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
</div>


<form method="post" action="{{route('admin.tags.delete')}}" class="modal fade" id="delete-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
			<div class="modal-body">
				Are you sure you want to delete tag?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</div>
	</div>
</form>
@endsection

@push('head_links')
<link href="{{url('/skins/admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@push('footer_javascript')
<script src="{{url('/skins/admin/vendor/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
<script src="{{url('/skins/admin/vendor/datatables/dataTables.bootstrap4.js')}}" type="text/javascript"></script>
<script>
	$('#records-table').on('click', '[data-action="delete"]', function(e) {
		
		e.preventDefault();
		
		var target = $(this);
		
		var id = target.attr('data-id');
		
		var deletePopup = $('#delete-record-modal');
		
		deletePopup.find('[name="id"]').val(id);
		
		deletePopup.modal('show');
	});
	
	$('#records-table').dataTable({
		'columns': [
			{
				'name': 'id',
				'data': 'id'
			},
			{
				'name': 'title',
				'data': 'title'
			},
			{
				'name': 'actions',
				'data': 'actions',
				'orderable': false,
				'className': 'text-center'
			}
		],
		'lengthMenu': [5, 10, 25, 50, 100, 250],
		'pageLength': 25,
		'order': [[1, 'asc']],
		'processing': true,
		'serverSide': true,
		'ajax': "{{route('admin.tags.datatable')}}"
	});
</script>
@endpush