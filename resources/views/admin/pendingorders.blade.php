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
                            <td>#</td>
                           <th>Package Name</th>

                           <th>Amount</th>
                           <th>Package Type</th>

                           <th>Car Type</th>
                           <th>Status</th>
                           <th>Name</th>
                           <th>Mobile</th>
                           <th>Created At</th>
                           <th>Action</th>

                         </tr>

                        </thead>

                            <tbody>



                            
                            <?php $i = 0;?>
                          @foreach ($carwasherequest as $element)
                            <tr>
                                <td>{{$i++}}</td>
                              <td>{{$element->package_name}}</td>
                              <td>{{$element->package_price}}</td>
                              <td>{{$element->package_category}}</td>
                              <td>{{$element->car_type}}</td>
                              
                              <td>{{$element->payment_status}}</td>
                              <td>{{$element->firstname}}</td>
                              <td>{{$element->mobile}}</td>
                              <td>{{$element->created_at}}</td>
                            </tr>
                          @endforeach

                        </tbody>
</table>                    
@endsection

