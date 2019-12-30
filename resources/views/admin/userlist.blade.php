@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Slider Images</h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Creation date</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
        @foreach ($userlists as $data)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->mobile }}</td>
            <td>{{ $data->email }}</td>
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

