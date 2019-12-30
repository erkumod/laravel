@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Promocode List</h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>status</th>
            <th>promo_code</th>
            <th>usable</th>
            <th>amount</th>
            <th>promo_type</th>
            <th>usage_type</th>
            <th>user_id</th>
            <th>expiry_date date</th>
            <th>message</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    	@foreach ($data as $promocode)
        <tr>
            <td>{{ $promocode->status }}</td>
            <td>{{ $promocode->promo_code }}</td>
            <td>{{ $promocode->usable }}</td>
            <td>{{ $promocode->amount }}</td>
            <td>{{ $promocode->promo_type }}</td>
            <td>{{ $promocode->usage_type }}</td>
            <td>{{ $promocode->user_id }}</td>
            <td>{{ $promocode->expiry_date }}</td>
            <td>{{ $promocode->message }}</td>
            <td>
                {{ link_to_route('promocode.edit','Edit',[$promocode->id], ['class'=> 'btn btn-primary btn-xs']) }}

                    {!! Form::open(['method'=>'delete','route'=>['promocode.destroy', $promocode->id]]) !!}

                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!}
           </td>
        </tr>
        @endforeach
       
    </tbody>
</table>                    
@endsection

