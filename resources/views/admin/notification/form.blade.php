<div class="form-group">
    {!! Form::label('notification_title', 'Title:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('notification_title', null, ['class' => 'form-control','rows'=> '3','id' => 'notification_title'])!!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('notification_desc', 'Description:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('notification_desc', null, ['class' => 'form-control','rows'=> '3','id' => 'notification_desc'])!!}
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