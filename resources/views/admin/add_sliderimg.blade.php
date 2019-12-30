@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Add Slider Image</h4>
@if(isset($success))
    <div class="alert alert-success"> {{$success}} </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(isset($slides))
    {{ Form::model($slides, ['route' => ['slider_img.update', $slides->id],'class'=>'form-horizontal', 'files' => true, 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'slider_img.store','class'=>'form-horizontal','files' => true )) !!}

@endif
                                        
                                        
                                        <div class="form-group">
				                            {!! Form::label('title','Title :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('name',Input::old('name'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','Description :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('description',Input::old('description'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        
				                        <div class="form-group">
				                            {!! Form::label('title','Slider Image :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::file('slide_img',Input::old('slide_img'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>	
				                       
				                        <div class="form-group">
				                            <div class="col-sm-6 col-sm-offset-5">
				                                {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
				                            </div>
				                        </div>


                                    {!! Form::close() !!}                  
                        


                        


                        

                    
@endsection


