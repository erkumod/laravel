@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Car Wash Package List <a href="{{ url('admin/car_wash/create')}}" class="btn btn-primary btn-xs">Add Package</a></h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Package Name</th>
            <th>Package Category</th>
            <th>Package type</th>
            <th>Package Price</th>
            {{-- <th>Package Image</th> --}}
            <th>Package Description</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
    	@foreach ($car_wash as $data)
        <tr>
            <td> {{ $i }}</td>
            <td>{{ $data->package_name }}</td>
            <td>{{ $data->package_category }}</td>
            <td>{{ $data->package_type }}</td>
            <td>{{ $data->package_price }}</td>
            {{-- <td><img src="{{ asset('images/carwash/'.$data->package_img) }}" alt="" style="width: 100px; height: 50px;"></td> --}}
            <td>{{ $data->package_desc }}</td>
            <td>
                {{ link_to_route('car_wash.edit','Edit',[$data->id], ['class'=> 'btn btn-primary btn-xs col-md-4']) }}

                    {!! Form::open(['method'=>'delete','route'=>['car_wash.destroy', $data->id],'class'=>'col-md-6' ]) !!}

                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!}
                {!! Form::close() !!}
           </td>
        </tr>
        <?php $i++; ?> 
        @endforeach
       
    </tbody>
</table>                    
@endsection

