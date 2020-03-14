<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('title', null, ['class' => 'form-control','rows'=> '3','id' => 'title'])!!}
    </div>
</div>
<div class='form-group'>
    {!! Form::label('description', 'Description:',['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::textArea('description', null, ['class' => 'form-control','rows'=> '10','cols'=> '10','id' => 'description'])!!}
        @if($errors->has('description'))
            <span class="text-danger m-b-none">{{ $errors->first('description') }}</span>
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-5">
        {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
    </div>
</div>
@push('script')
<style>
    select.form-control:not([size]):not([multiple]) {
        height: calc(3.19rem + 2px);
    }
</style>
<script>
    $('#description').summernote('code');
</script>
@endpush