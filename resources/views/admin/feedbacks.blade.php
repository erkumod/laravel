@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Feedbacks <a href="{{ url('admin/feedbacks/create')}}" class="btn btn-primary btn-xs">Add feedback</a></h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Reviews</th>
            <th>Image</th>
            <th>Date</th>
            <th>Action</th>
           
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
    	@foreach ($feedback as $data)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->desc }}</td>
            <td><img src="{{ asset('images/feedbacks/'.$data->pic) }}" alt="" style="width: 100px; height: 50px;">
            <td>{{ $data->created_at }}</td></td>
          
            <td>
                 {{ link_to_route('feedbacks.edit','Edit',[$data->id], ['class'=> 'btn btn-primary btn-xs col-md-2']) }}

                    {!! Form::open(['method'=>'delete','route'=>['feedbacks.destroy', $data->id],'class'=>'col-md-6' ]) !!}

                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!}
           </td>
        </tr>
        <?php $i++; ?>
        @endforeach
       
    </tbody>
</table>                    
@endsection

