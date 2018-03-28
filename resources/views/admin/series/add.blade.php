@extends('admin.layout')



@section('content')


<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin.series.index')}}">Series</a>
    </li>
    <li class="breadcrumb-item active">
        Add Series
    </li>
</ol>
<h1>Add New Series</h1>
<hr>			

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Add Series
    </div>
    <div class="card-body">

        <form action="" method="post">
            {{csrf_field()}}
            <div class="form-group">
                
                <label>Name</label> 
                <input name="series_name" 
                       value="{{old('series_name')}}" 
                       placeholder="Enter Series Name" 
                       aria-describedby="titleHelpBlock" 
                       required="required" 
                       class="form-control here" 
                       type="text"
                > 
                @if($errors->has('series_name'))

                <div class="form-errors text-danger">
                    @foreach($errors->get('series_name') as $errorMessage)
                    <label class="error">{{$errorMessage}}</label>
                    @endforeach
                </div>

                @endif

               
            </div> 
            <div class="form-group text-right">
                <a href="{{route('admin.series.index')}}" class="btn btn-secondary">Cancel</a>
                <button name="submit" type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

