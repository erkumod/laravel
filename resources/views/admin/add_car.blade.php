@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Add Car</h4>
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
@if(isset($cars))
    {{ Form::model($cars, ['route' => ['cars.update', $cars->id],'class'=>'form-horizontal', 'files' => true, 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'cars.store','class'=>'form-horizontal','files' => true )) !!}

@endif
                                        
<?php 
    $select = [];
    $select[0]='SELECT';
        foreach($brands as $brands){
            $select[$brands->id] = $brands->brand_name;
        }




 ?>
                                        
                <div class="form-group">
                    {!! Form::label('title','Brand Name :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                 		 {{ Form::select('brand_id', $select , null, ['class'=>'form-control','onchange' => 'getmodel(this.value)'] ) }}

                        {{-- {!! Form::text('brand_name',Input::old('brand_name'),['class'=>'form-control'])!!} --}}
                    </div>
                </div>
                <div id="model_data"></div>
                <div class="form-group">
                    {!! Form::label('title','Car Category :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {{ Form::select('car_category', 
                        				[ 'hatchback' => 'Hatchback', 
                        				  'sedan' => 'Sedan',
                        				  'suv' => 'Suv',
                        				  'premium' => 'Premium'
                        				],Input::old('car_category'),['class'=>'form-control'] ) }}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('title','Car Model :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::text('car_model',Input::old('car_model'),['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('title','Description :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::text('car_desc',Input::old('car_desc'),['class'=>'form-control'])!!}
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('title','Car Image :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::file('car_img',Input::old('car_img'),['class'=>'form-control'])!!}
                    </div>
                </div>	
               
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-5">
                        {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
                    </div>
                </div>


            {!! Form::close() !!}                         

                    

                    
@endsection