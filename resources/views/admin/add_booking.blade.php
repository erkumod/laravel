@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Add Car Wash Booking </h4>
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

       {{-- @if(isset($car_wash))
    {{ Form::model($car_wash, ['route' => ['car_wash.update', $car_wash->id],'class'=>'form-horizontal', 'files' => true, 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'car_wash.store','class'=>'form-horizontal','files' => true )) !!}

@endif --}}

        <form action="/admin/book_car_wash" method="POST" class="form-horizontal" >
            {{ csrf_field() }}
            <div class="form-group">
            {!! Form::label('title','User Name :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {{ Form::select('user_id', 
                                $users,Input::old('user_id'),['class'=>'form-control'] ) }}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('title','First Name :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {!! Form::text('firstname',Input::old('firstname'),['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
        	{!! Form::label('title','Last Name :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {!! Form::text('lastname',Input::old('lastname'),['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title','Email :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {!! Form::text('email',Input::old('email'),['class'=>'form-control'])!!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('title','Mobile :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {!! Form::text('mobile',Input::old('mobile'),['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title','Package Name :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {{ Form::select('package_id', 
                                $packages,Input::old('package_id'),['class'=>'form-control'] ) }}
            </div>
        </div>
        

        <div class="form-group">
            {!! Form::label('title','Brand Name :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {{ Form::select('brand_id', 
                                $brands,Input::old('brand_id'),['class'=>'form-control'] ) }}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title','Model Name :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {{ Form::select('model_id', 
                                $carmodels,Input::old('model_id'),['class'=>'form-control'] ) }}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('title','Car Category :',['class'=>'col-sm-3 control-label'])!!}
            <div class="col-sm-6">
                {{ Form::select('car_type', 
                                [ 'hatchback' => 'Hatchback', 
                                  'sedan' => 'Sedan',
                                  'suv' => 'Suv',
                                  'compact suv' => 'Compact Suv',
                                  'premium' => 'Premium',
                                  'other' => 'Other'
                                ],Input::old('car_type'),['class'=>'form-control'] ) }}
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


