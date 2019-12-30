@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Send SMS</h4>
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

<form action="sendsms" method="POST">
                                        
                                 
                
                <div class="form-group">
                    {!! Form::label('title','Contact Number :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::text('cellno',Input::old('cellno'),['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('title','SMS :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::textarea('sms',Input::old('sms'),['class'=>'form-control'])!!}
                    </div>
                </div>
                
                
               
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-5">
                        {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
                    </div>
                </div>


            {!! Form::close() !!}                         

                    

                    
@endsection