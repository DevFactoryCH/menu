<div class="box-header">
    <h3 class="box-title">{{ trans('pages.box.title') }}</h3>

    {!! \App\Libs\Helpers::getLangSelector() !!}
</div>


<div class="box-body">

    <div class="form-group {!! $errors->has('title') ? 'has-error has-feedback' : '' !!}">
        {!! Form::label('title', NULL, array('class' => 'control-label')) !!}
        {!! Form::text('title', NULL, array('class' => 'form-control')) !!}
        {!! $errors->has('title') ? Form::label('error', $errors->first('title'), array('class' => 'control-label')) : '' !!}
        {!! $errors->has('title') ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' !!}
    </div>

    <div class="form-group {!! $errors->has('url') ? 'has-error has-feedback' : '' !!}">
        {!! Form::label('url', NULL, array('class' => 'control-label')) !!}
        {!! Form::text('url', NULL, array('class' => 'form-control', 'placeholder' => 'example : home or http://www.google.ch')) !!}
        {!! $errors->has('url') ? Form::label('error', $errors->first('url'), array('class' => 'control-label')) : '' !!}
        {!! $errors->has('url') ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' !!}
    </div>

    <div class="form-group {!! $errors->has('external') ? 'has-error has-feedback' : '' !!}">
        {!! Form::label('external', NULL, array('class' => 'control-label')) !!}
        {!! Form::checkbox('external') !!}
        {!! $errors->has('external') ? Form::label('error', $errors->first('external'), array('class' => 'control-label')) : '' !!}
        {!! $errors->has('external') ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' !!}
    </div>

    {!! Form::hidden('lang', \App\Libs\Helpers::getLang()) !!}

</div>
