@extends('admin.layout')

@section('head_title', trans('admin.edit_team'))

@section('content')


<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('admin.teams.index')}}">Teams</a>
    </li>
    <li class="breadcrumb-item active">
        Edit Team
    </li>
</ol>
<h1>Edit Team: {{$team->title}}</h1>
<hr>			

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Edit Team
    </div>
    <div class="card-body">

        <form action="" method="post">
            {{csrf_field()}}
            <div class="form-group">
               
                <label>Title</label> 
                
                <input name="title" 
                       value="{{old('title', $team->title)}}" 
                       placeholder="Enter Title" 
                       aria-describedby="titleHelpBlock" 
                       required="required" 
                       class="form-control here" 
                       type="text"
                       > 
                @if($errors->has('title'))

                <div class="form-errors text-danger">
                    @foreach($errors->get('title') as $errorMessage)
                    <label class="error">{{$errorMessage}}</label>
                    @endforeach
                </div>

                @endif
            </div> 
            <div class="form-group text-right">
                <a href="{{route('admin.teams.index')}}" class="btn btn-secondary">Cancel</a>
                <button name="submit" type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

