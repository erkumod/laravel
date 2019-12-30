@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Car Model List <a href="{{ url('admin/carmodels/create')}}" class="btn btn-primary btn-xs">Add model</a></h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="carmodeltable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Model Name</th>
            <th>Brand Name</th>
            <th>Type</th>
            <th>Image</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
    	@foreach ($carmodels as $model)
        <tr>
            <td> {{ $i }}</td>
            <td>{{ $model->model_name }}</td>
            <td>{{ $model->brand_name }}</td>
            <td>{{ $model->type }}</td>
            <td><img src="{{ asset('images/carmodels/'.$model->model_img) }}" alt="" style="width: 100px; height: 50px;"></td>
            <td>{{ $model->model_desc }}</td>
            <td>
                <div class="col-md-6">
                    
                {{ link_to_route('carmodels.edit','Edit',[$model->id], ['class'=> 'btn btn-primary btn-xs ']) }}
                </div>
                <div class="col-md-6">
                    

                    {!! Form::open(['method'=>'delete','route'=>['carmodels.destroy', $model->id],'class'=>'' ]) !!}

                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!}
                </div>
           </td>
        </tr>
        <?php $i++; ?> 
        @endforeach
       
    </tbody>
</table>                    
@endsection

