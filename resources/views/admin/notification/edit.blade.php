@extends('layouts.admin')

@section('title', 'Edit Notification')

@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Edit Notification</h4>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::model($form, ['method' => 'PATCH', 'action' => ['NotificationController@update',$form->id], 'id'
=> 'notificationForm','class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
    @include('admin.notification.form')
{!! Form::close() !!}
@endsection