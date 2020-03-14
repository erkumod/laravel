@extends('layouts.frontend')

@section('content')

<style type="text/css">
  .privacytext{ margin-left: 200px; max-width: 800px; margin-right: 200px;}  
 .privacytext h4{ color:#183861;
    font-weight: bold;font-size: 27px;}
    ..privacytext p{ margin-top: -30px!important; padding: 0!important; }
</style>


<div  style=" background: linear-gradient(-200deg, #0777c7 0%, #00BEF5 97%);
 width: 100%; height: 100px;"></div>
<section class="about" style="padding: 30px;">
	
	<div class="container">

		<div class="row">

			<div class="col-md-6">
				<h1 style="font-family: berlin;color: #183861; text-align: center;">
                    @if(!is_null($privacy))
                        {!! $privacy->title !!}
                    @endif
                </h1>
				<hr>
                <div  class="privacytext">
                    @if(!is_null($privacy))
                        {!! $privacy->description !!}
                    @endif            
                </div>
			

			</div>
		</div>
	</div>
</section>

@endsection