@extends($layout->extends)

{{-- Page title --}}
@section($layout->header)
  <h1>@lang('variables::menu.page_title')</h1>
@stop

@section($layout->content)

@section('content')

    <div class="row">

    {!! Form::open(array('method' => 'POST', 'url' => action('\Devfactory\Menu\Controllers\MenuController@postStore'), 'id' => 'app-create', 'class' => 'form')) !!}

    <div class="col-md-12">

      <!-- general form elements -->
      <div class="box box-primary">

        @include('menu::form')

          <div class="box-footer">
          {!! Form::submit(trans('general.buttons.add'), array('class' => 'btn btn-primary btn-flat')) !!}
        </div>

      </div>
    </div>
    {!! Form::close() !!}

    </div>
@stop
