@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Complains List</h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Message</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
    	@foreach ($complains as $data)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->message }}</td>
            <td>{{ $data->created_at }}</td>
            <td>
                {{-- {{ link_to_route('data.edit','Edit',[$data->id], ['class'=> 'btn btn-primary btn-xs']) }} --}}

                    {{-- {!! Form::open(['method'=>'delete','route'=>['complain_destroy', $data->id]]) !!} --}}

                {{-- {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!} --}}
           </td>
        </tr>
        <?php $i++; ?>
        @endforeach
       
    </tbody>
</table>                    
@endsection

