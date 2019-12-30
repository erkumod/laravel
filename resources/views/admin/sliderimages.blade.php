@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Slider Images List</h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slide</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
    	@foreach ($slides as $slide)
        <tr>
            <td> {{ $i }}</td>
            <td>{{ $slide->name }}</td>
            <td><img src="{{ asset('images/slider/'.$slide->slide_img) }}" alt="" style="width: 100px; height: 50px;"></td>
            <td>{{ $slide->description }}</td>
            <td>
                {{ link_to_route('slider_img.edit','Edit',[$slide->id], ['class'=> 'btn btn-primary btn-xs col-md-2']) }}

                    {!! Form::open(['method'=>'delete','route'=>['slider_img.destroy', $slide->id],'class'=>'col-md-6' ]) !!}

                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!}
           </td>
        </tr>
        <?php $i++; ?> 
        @endforeach
       
    </tbody>
</table>                    
@endsection

