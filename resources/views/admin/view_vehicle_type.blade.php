@extends('layouts.admin')
@section('content')
<div class="row">
    <h4 class="header-title m-t-0 m-b-30">Vehicle Type List</h4>
    <table id="datatable-keytable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Rate</th>
                <th>Image</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($vehicles as $vehicle)
            <tr>
                <td>{{$vehicle->vehicle_type}}</td>
                <td>{{$vehicle->description}}</td>
                <td>{{$vehicle->rate}}</td>
                <td>{{$vehicle->image}}</td>
                <td>{{$vehicle->status}}</td>
                <td>{{$vehicle->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection