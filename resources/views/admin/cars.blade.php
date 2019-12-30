@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Car List &nbsp; <a href="{{ url('admin/cars/create')}}" class="btn btn-primary btn-xs">Add Car</a></h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Car Brand</th>
            <th>Car Model</th>
            <th>Car Category</th>
            <th>Car Image</th>
            <th>Car Description</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
    	@foreach ($cars as $data)
        <tr>
            <td> {{ $i }}</td>
            <td>{{ $data->brand_name }}</td>
            <td>{{ $data->model_name }}</td>
            <td>{{ $data->car_category }}</td>
            <td><img src="{{ asset('images/car/'.$data->car_img) }}" alt="" style="width: 100px; height: 50px;"></td>
            <td>{{ $data->car_desc }}</td>
            <td>
                {{ link_to_route('cars.edit','Edit',[$data->id], ['class'=> 'btn btn-primary btn-xs col-md-4']) }}

                    {!! Form::open(['method'=>'delete','route'=>['cars.destroy', $data->id],'class'=>'col-md-6' ]) !!}

                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!}
           </td>
        </tr>
        <?php $i++; ?> 
        @endforeach
       
    </tbody>
</table>                    
@endsection