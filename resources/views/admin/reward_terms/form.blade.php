<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control','rows'=> '3','id' => 'name'])!!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('code', 'Code:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('code', null, ['class' => 'form-control','rows'=> '3','id' => 'code'])!!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-5">
        {!! Form::submit('submit',array('class' => 'btn btn-primary'))!!}
    </div>
</div>
@push('script')
<script>

</script>
@endpush