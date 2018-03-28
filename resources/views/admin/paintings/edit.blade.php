@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.paintings.index')}}">Paintings</a>
	</li>
	<li class="breadcrumb-item active">
		Edit
	</li>
</ol>
<h1>Edit Product: {{$painting->title}}</h1>
<hr>			

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Edit Painting
	</div>
	<div class="card-body">

		<form action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <fieldset class="col-lg-6">
                    <legend>General settings</legend>
                    <div class="form-group">
                        <label>Series</label>
                        <select class="form-control" name="one_series_id">
                            <option>--- Choose Series ---</option>
                            @foreach($series as $oneSeries)
                            <option
                                value="{{$oneSeries->id}}"
                                @if(old('one_series_id')== $oneSeries->id)
                                selected
                                @endif
                                >{{$oneSeries->series_name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('one_series_id'))
                        <div class="form-errors text-danger">
                            @foreach($errors->get('one_series_id') as $errorMessage)
                            <label class="error">{{$errorMessage}}</label>
                            @endforeach
                        </div>
                        @endif
                    </div> 

                    <div class="form-group">
                        <label>Name</label> 
                        <input value="{{old('name')}}" name="name" placeholder="Enter Name" required="required" class="form-control" type="text"> 
                        @if($errors->has('name'))
                        <div class="form-errors text-danger">
                            @foreach($errors->get('name') as $errorMessage)
                            <label class="error">{{$errorMessage}}</label>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label> 
                        <textarea name="description" placeholder="Enter Description" class="form-control" rows="12">{{old('description')}}</textarea>
                        @if($errors->has('description'))
                        <div class="form-errors text-danger">
                            @foreach($errors->get('description') as $errorMessage)
                            <label class="error">{{$errorMessage}}</label>
                            @endforeach
                        </div>
                        @endif
                    </div> 
                </fieldset>
                <fieldset class="col-lg-6">
                    <legend>Painting photo</legend>
                    <div class="text-center mb-5">
                        <img class="img-fluid img-thumbnail" src="http://via.placeholder.com/640x480" alt="placeholder">
                    </div>

                    <div class="form-group">
                        <label>Upload photo</label>
                        <div class="custom-file">
                            <input name="product_photo_file" type="file" class="custom-file-input" id="product_photo_file">
                            <label class="custom-file-label" for="product_photo_file">Choose photo</label>
                        </div>
                        @if($errors->has('product_photo_file'))
                        <div class="form-errors text-danger">
                            @foreach($errors->get('product_photo_file') as $errorMessage)
                            <label class="error">{{$errorMessage}}</label>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </fieldset>
            </div>

            <div class="row">
                <fieldset class="col-lg-12">

                    <div class="row">

                        <div class="form-group col-lg-3">
                            <label>Price</label> 
                            <input value="{{old('price')}}" name="price" class="form-control" type="text"> 
                            @if($errors->has('price'))
                            <div class="form-errors text-danger">
                                @foreach($errors->get('price') as $errorMessage)
                                <label class="error">{{$errorMessage}}</label>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Year</label> 
                            <input value="{{old('year')}}" name="year" class="form-control" type="text"> 
                            @if($errors->has('year'))
                            <div class="form-errors text-danger">
                                @foreach($errors->get('year') as $errorMessage)
                                <label class="error">{{$errorMessage}}</label>
                                @endforeach
                            </div>
                            @endif
                        </div>
                         <div class="form-group col-lg-3">
                            <label>Size</label> 
                            <input value="{{old('size')}}" name="size" class="form-control" type="text"> 
                            @if($errors->has('size'))
                            <div class="form-errors text-danger">
                                @foreach($errors->get('size') as $errorMessage)
                                <label class="error">{{$errorMessage}}</label>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </fieldset>
            </div>


            <div class="row">
                <div class="form-group text-right col-lg-12">
                    <hr>
                    <a class="btn btn-secondary" href="{{route('admin.paintings.index')}}">Cancel</a>
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
	</div>
</div>
@endsection