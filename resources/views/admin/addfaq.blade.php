@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Add FAQ</h4>
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
@if(isset($faq))
    {{ Form::model($faq, ['route' => ['faqs.update', $faq->id],'class'=>'form-horizontal', 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'faqs.store','class'=>'form-horizontal' )) !!}

@endif
                                        
                                        
                                        <div class="form-group">
				                            {!! Form::label('title','FAQ Question :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('question',Input::old('question'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','Answer :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('answer',Input::old('answer'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        
				                        <div class="form-group">
				                            <div class="col-sm-6 col-sm-offset-5">
				                                {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
				                            </div>
				                        </div>


                                    {!! Form::close() !!}

                        
                        


                        


                        

                    
@endsection

