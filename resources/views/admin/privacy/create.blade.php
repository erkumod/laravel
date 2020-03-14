@extends('layouts.admin')
@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Add Privacy</h4>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['action' => 'PrivacyController@store', 'id' => 'privacyForm','class'=>'form-horizontal','enctype' =>
'multipart/form-data']) !!}
    @include('admin.privacy.form')
{!! Form::close() !!}
@endsection