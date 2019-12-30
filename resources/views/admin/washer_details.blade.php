@extends('layouts.admin')


@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Washer Details</h4>
<div class="col-md-3">
	<img src="/image/profilepic.jpg" alt="">
</div>
<style>
	.title{
		font-size: large;
		font-weight: bold;
	}

	.value{
		font-size: larger;
		font-weight: bolder;
	}
</style>
<div class="col-md-9">
	@if ($washerdetails->status == "Deactive")
		<a href="/admin/activatewasher/{{ $washerdetails->id }}" class="btn btn-info pull-right">Approve</a>
	@else
		<span class="btn btn-primary pull-right">Approved</span>
	@endif
	<span class="title" >Name : </span> <span class="value">{{ $washerdetails->name }}</span><br>
	<span class="title" >Email : </span> <span class="value">{{ $washerdetails->email }}</span><br>
	<span class="title" >Phone No : </span> <span class="value">{{ $washerdetails->mobile }}</span><br>
	<span class="title" >Date Of Birth : </span> <span class="value">@if ($profile){{  $profile->dob }}@endif</span><br>
</div>
<div class="clearfix"></div>
<div class="col-md-4">
	<h3>Submitted Details</h3>
	<span class="title" >Name : </span> <span class="value">{{ $washerdetails->requester_name }}</span><br>
	<span class="title" >Email : </span> <span class="value">{{ $washerdetails->requester_email }}</span><br>
	<span class="title" >Phone No : </span> <span class="value">{{ $washerdetails->requester_mobile }}</span><br>
	<span class="title" >Date Of Birth : </span> <span class="value">{{ $washerdetails->requester_dob }}</span><br>
</div>
<div class="col-md-8">
	
<table class="tabel table-bordered">
	<tr>
		<th width="20%">Proof</th>
		<th>Front</th>
		<th>Back</th>
	</tr>
	<tr>
		<td>
			NRIC
		</td>
		<td >
			<img width="270px" src="{{ $washerdetails->requester_front_pic }}" alt="">
			
		</td>
	
		<td width="270px">
			<img width="270px" src="{{ $washerdetails->requester_back_pic }}" alt="">
			
		</td>
	</tr>
</table>
</div>

<div class="clearfix"></div>
                        
                        


                        


                        

                    
@endsection

