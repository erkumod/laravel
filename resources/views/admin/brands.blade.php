@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Brands List</h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Brand Name</th>
            <th>Brand Image</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
    	@foreach ($brands as $brand)
        <tr>
            <td> {{ $i }}</td>
            <td>{{ $brand->brand_name }}</td>
            <td><img src="{{ asset('images/brand/'.$brand->brand_img) }}" alt="" style="width: 100px; height: 50px;"></td>
            <td>{{ $brand->description }}</td>
            <td>
                {{ link_to_route('brands.edit','Edit',[$brand->id], ['class'=> 'btn btn-primary btn-xs col-md-2']) }}

                    {!! Form::open(['method'=>'delete','route'=>['brands.destroy', $brand->id],'class'=>'col-md-6' ]) !!}

                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!}
           </td>
        </tr>
        <?php $i++; ?> 
        @endforeach
       
    </tbody>
</table>                    
@endsection

