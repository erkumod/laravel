@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
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
@if(isset($promocode))
    {{ Form::model($promocode, ['route' => ['promocode.update', $promocode->id],'class'=>'form-horizontal', 'method' => 'patch']) }}
@else

    {!!  Form::open(array('route' =>'promocode.store','class'=>'form-horizontal' )) !!}

@endif
                                        
                                        
                                        <div class="form-group">
				                            {!! Form::label('title','PromoCode Name :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('promo_code',Input::old('promo_code'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','Amount :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('amount',Input::old('amount'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','PromoCode Type :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {{ Form::select('promo_type', 
				                                				[ 'amount' => 'Amount', 
				                                				  'percent' => 'Percent'
				                                				],Input::old('promo_type'),['class'=>'form-control'] ) }}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','Usage Type :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {{ Form::select('usage_type', 
				                                				[ 'single' => 'Single', 
				                                				  'multiple' => 'Multiple'
				                                				],Input::old('usage_type'),['class'=>'form-control'] ) }}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','User Name :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('user_id',Input::old('user_id'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','Expiry Date :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::date('expiry_date',Input::old('expiry_date'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            {!! Form::label('title','PromoCode Message :',['class'=>'col-sm-3 control-label'])!!}
				                            <div class="col-sm-6">
				                                {!! Form::text('message',Input::old('message'),['class'=>'form-control'])!!}
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            <div class="col-sm-6 col-sm-offset-5">
				                                {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
				                            </div>
				                        </div>


                                    {!! Form::close() !!}

                        
                        


                        


                        

                    
@endsection

