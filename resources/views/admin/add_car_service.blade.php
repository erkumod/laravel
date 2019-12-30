@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Add Car Servicing Package </h4>
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
@if(isset($car_service))
    {{ Form::model($car_service, ['route' => ['car_service.update', $car_service->id],'class'=>'form-horizontal', 'files' => true, 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'car_service.store','class'=>'form-horizontal','files' => true )) !!}

@endif
                                        
                                        
                                        <div class="form-group">
				                            {!! Form::label('title','Package Name :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('package_name',Input::old('package_name'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','Package Category :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {{ Form::select('package_category', 
				                                				[ 'hatchback' => 'Hatchback', 
				                                				  'sedan' => 'Sedan',
				                                				  'suv' => 'Suv',
				                                				  'premium' => 'Premium'
				                                				],Input::old('package_category'),['class'=>'form-control'] ) }}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','Package Type :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {{ Form::select('package_type', 
				                                				[ 'daily' => 'Daily', 
				                                				  'mothly' => 'Mothly',
				                                				  'yearly' => 'Yearly',
				                                				  'quaterly' => 'Quaterly'
				                                				],Input::old('package_type'),['class'=>'form-control'] ) }}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','Package Amount :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('package_price',Input::old('package_price'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','Description :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('package_desc',Input::old('package_desc'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        
				                        <div class="form-group">
				                            {!! Form::label('title','Package Image :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::file('package_img',Input::old('brand_img'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>	
				                       
				                        <div class="form-group">
				                            <div class="col-sm-6 col-sm-offset-5">
				                                {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
				                            </div>
				                        </div>


                                    {!! Form::close() !!}                  
                        


                        


                        

                    
@endsection


