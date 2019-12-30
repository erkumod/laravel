@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Vehicle Type List</h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Vehicle Type</th>
            <th>Description</th>
            <th>Icon</th>
            <th>Rate</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    	@foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ $vehicle->vehicle_type }}</td>
            <td>{{ $vehicle->description }}</td>
            <td>{{ $vehicle->icon }}</td>
            <td>{{ $vehicle->rate }}</td>
            <td>
                {{ link_to_route('vehicle_types.edit','Edit',[$vehicle->id], ['class'=> 'btn btn-primary btn-xs']) }}

                    {!! Form::open(['method'=>'delete','route'=>['vehicle_types.destroy', $vehicle->id]]) !!}

                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!}
           </td>
        </tr>
        @endforeach
       
    </tbody>
</table>                    
@endsection

