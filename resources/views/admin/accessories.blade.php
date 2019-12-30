@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Accessories List <a href="{{ url('admin/accessories/create')}}" class="btn btn-primary btn-xs">Add Accessory</a></h4>
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $i=1; ?>
        <?php var_dump($accessories); die;?>
        	@foreach ($accessories as $accessory)
            <tr>
                <td> {{ $i }}</td>
                <td>{{ $accessory->name }}</td>
                <td>
                   {{--  <?php 
                        $data[] = $saccessory->image[]; 
                    ?> 
                    @foreach()
                    <img src="{{ asset('images/accessories/'.$accessory->image) }}" alt="" style="width: 100px; height: 50px;"> --}}

                </td>
                <td>{{ $accessory->description }}</td>
                <td>
                    {{ link_to_route('accessories.edit','Edit',[$accessory->id], ['class'=> 'btn btn-primary btn-xs col-md-2']) }}

                        {!! Form::open(['method'=>'delete','route'=>['accessories.destroy', $accessory->id],'class'=>'col-md-6' ]) !!}

                    {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs' ])!!}
               </td>
            </tr>
            <?php $i++; ?> 
            @endforeach
        @endif
       
    </tbody>
</table>                    
@endsection

