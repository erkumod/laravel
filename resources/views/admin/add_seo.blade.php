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
@if(isset($seo))
    {{ Form::model($seo, ['route' => ['seo.update', $seo->id],'class'=>'form-horizontal', 'files' => true, 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'seo.store','class'=>'form-horizontal','files' => true )) !!}

@endif
                                        

                <div class="form-group">
                    {!! Form::label('title','Page Name :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::text('page_name',Input::old('page_name'),['class'=>'form-control', 'readonly' => 'True'])!!}
                    </div>
                </div>                     
              
                <div class="form-group">
                    {!! Form::label('title','Title :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::text('title',Input::old('title'),['class'=>'form-control'])!!}
                    </div>
                </div>



                <div class="form-group">
                    {!! Form::label('title','Tags :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::text('tags',Input::old('tags'),['class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('title','Keywords :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::text('keywords',Input::old('keywords'),['class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('title','Descriptions :',['class'=>'col-sm-3 control-label'])!!}
                    <div class="col-sm-6">
                        {!! Form::text('meta_desc',Input::old('meta_desc'),['class'=>'form-control'])!!}
                    </div>
                </div>
                
                
               
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-5">
                        {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
                    </div>
                </div>


            {!! Form::close() !!}                         

                    

                    
@endsection