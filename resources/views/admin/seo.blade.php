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
            <th>Title</th>
            <th>Page Name</th>
            <th>Keywords</th>
            <th>Meta description</th>
            <th>Tags</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
    	@foreach ($seo as $data)
        <tr>
            <td> {{ $i }}</td>
            <td>{{ $data->title }}</td>
            <td>{{ $data->page_name }}</td>
            <td>{{ $data->keywords }}</td>
            <td>{{ $data->meta_desc }}</td>
            <td>{{ $data->tags }}</td>
            <td>
                {{ link_to_route('seo.edit','Edit',[$data->id], ['class'=> 'btn btn-primary btn-xs col-md-4']) }}                
           </td>
        </tr>
        <?php $i++; ?> 
        @endforeach
       
    </tbody>
</table>                    
@endsection

