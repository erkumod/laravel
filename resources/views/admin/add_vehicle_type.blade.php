@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Vehicle Types</h4>
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
@if(isset($vehicles))
    {{ Form::model($vehicles, ['route' => ['vehicle_types.update', $vehicles->id],'class'=>'form-horizontal', 'files' => true, 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'vehicle_types.store','class'=>'form-horizontal','files' => true )) !!}

@endif
                                        
                                        
                                        <div class="form-group">
				                            {!! Form::label('title','Vehicle Type :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('vehicle_type',Input::old('vehicle_type'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','Description :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('description',Input::old('description'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        
				                        <div class="form-group">
				                            {!! Form::label('title','Icon :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::file('icon',Input::old('icon'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>								                          
				                        <div class="form-group">
				                            {!! Form::label('title','Rate :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('rate',Input::old('rate'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                       
				                        <div class="form-group">
				                            <div class="col-sm-6 col-sm-offset-5">
				                                {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
				                            </div>
				                        </div>


                                    {!! Form::close() !!}

                        
                        


                        


                        

                    
@endsection


