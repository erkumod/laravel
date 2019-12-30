@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Add Car Model</h4>
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
@if(isset($carmodels))
    {{ Form::model($carmodels, ['route' => ['carmodels.update', $carmodels->id],'class'=>'form-horizontal', 'files' => true, 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'carmodels.store','class'=>'form-horizontal','files' => true )) !!}

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
                 		 {{ Form::select('brand_id', $select , null, ['class'=>'form-control']) }}

                        {{-- {!! Form::text('brand_name',Input::old('brand_name'),['class'=>'form-control'])!!} --}}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('title','Model Name :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::text('model_name',Input::old('model_name'),['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('title','Package Category :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {{ Form::select('type', 
                                        [ 'hatchback' => 'Hatchback', 
                                          'sedan' => 'Sedan',
                                          'suv' => 'Suv',
                                          'compact suv' => 'Compact Suv',
                                          'premium' => 'Premium',
                                          'other' => 'Other'
                                        ],Input::old('type'),['class'=>'form-control'] ) }}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('title','Description :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::text('model_desc',Input::old('model_desc'),['class'=>'form-control'])!!}
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label('title','Model Image :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::file('model_img',Input::old('model_img'),['class'=>'form-control'])!!}
                    </div>
                </div>	
               
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-5">
                        {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
                    </div>
                </div>


            {!! Form::close() !!}                         

                    

                    
@endsection