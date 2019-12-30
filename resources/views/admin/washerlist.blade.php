@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Washer List</h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Mobile</th>
            <th>Creation date</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
        @foreach ($washerdetails as $data)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $data->requester_name }}</td>
            <td>{{ $data->requester_email }}</td>
            <td>{{ $data->requester_dob }}</td>
            <td>{{ $data->requester_mobile }}</td>
            <td>{{ $data->created_at }}</td>
            
            <td>
                <a href="/admin/washer/{{ $data->user_id }}">View Details</a>

                    {{-- {!! Form::open(['method'=>'delete','route'=>['complain_destroy', $data->id]]) !!} --}}

                {{-- {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!} --}}
           </td>
        </tr>
        <?php $i++; ?>
        @endforeach
       
    </tbody>
</table>                    

                
@endsection

