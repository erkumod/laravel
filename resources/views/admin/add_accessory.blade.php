@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Add Accessory</h4>
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
@if(isset($accessories))
    {{ Form::model($accessories, ['route' => ['accessories.update', $accessories->id],'class'=>'form-horizontal', 'files' => true, 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'accessories.store','class'=>'form-horizontal','files' => true )) !!}

@endif
                                        
                                        
                <div class="form-group">
                    {!! Form::label('title','Name :',['class'=>'col-sm-3 control-label'])!!}
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
                    {!! Form::label('title','Image :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::file('image[]',['class'=>'form-control','multiple'],Input::old('image')) !!}
                    </div>
                </div>	
               
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-5">
                        {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
                    </div>
                </div>


            {!! Form::close() !!}                  
                                         


                        

                    
@endsection


