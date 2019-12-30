@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">FAQ List <a href="/admin/faqs/create" class="btn btn-primary">Add new</a></h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    	@foreach ($data as $faq)
        <tr>
            <td>{{ $faq->question }}</td>
            <td>{{ $faq->answer }}</td>
            
            <td>
                {{ link_to_route('faqs.edit','Edit',[$faq->id], ['class'=> 'btn btn-primary btn-xs']) }}

                    {!! Form::open(['method'=>'delete','route'=>['faqs.destroy', $faq->id]]) !!}

                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!}
           </td>
        </tr>
        @endforeach
       
    </tbody>
</table>                    
@endsection

