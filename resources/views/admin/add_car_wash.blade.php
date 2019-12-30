@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Add Car Wash Package </h4>
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
       @if(isset($car_wash))
    {{ Form::model($car_wash, ['route' => ['car_wash.update', $car_wash->id],'class'=>'form-horizontal', 'files' => true, 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'car_wash.store','class'=>'form-horizontal','files' => true )) !!}

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
                                  'compact suv' => 'Compact Suv',
                                  'premium' => 'Premium',
                                  'other' => 'Other'
                				],Input::old('package_category'),['class'=>'form-control'] ) }}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('title','Package Type :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {{ Form::select('package_type', 
                				[ 
                				  'monthly' => 'Monthly',
                				  'quarterly' => 'Quarterly',
                				  'halfyearly' => 'Half-Yearly',
                				  'yearly' => 'Yearly'
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
        	{{-- <label for="" class="col-sm-3 control-label">Description</label>
        	<div class="col-sm-6">
        		
			<textarea class="ckeditor" name="package_desc">{{ Input::old('package_desc') }}</textarea>
        	</div> --}}
            {!! Form::label('title','Description :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {!! Form::textarea('package_desc',Input::old('package_desc'),['class'=>'ckeditor'])!!}
            </div>
        </div>
        
       {{--  <div class="form-group">
            {!! Form::label('title','Package Image :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {!! Form::file('package_img',Input::old('brand_img'),['class'=>'form-control'])!!}
            </div>
        </div>	 --}}
       
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-5">
                {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
            </div>
        </div>


    {!! Form::close() !!}                  
                        


                        


                        

                    
@endsection


