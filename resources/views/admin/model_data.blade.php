
<div class="form-group">
	{!! Form::label('title','Model Name :',['class'=>'col-sm-3 control-label'])!!}
    <!-- <label class="sr-only" for="name">Name</label> -->
    <div class="col-sm-6">
    	
     <select name="car_model" required class="form-control brand" id="">
    	<option value="">--Choose Your Model--</option>
    	@foreach($data as $model)
    	<option value="{{ $model->id }}">{{ $model->model_name }}</option>
    	@endforeach
    </select>
    </div>
</div>