@extends($layout->extends)

{{-- Page title --}}
@section($layout->header)
  <h1>@lang('menus.page_title')</h1>
@stop

@section($layout->content)

@section('content')

    <div class="row">

    {!! Form::model($menu, array('method' => 'PUT', 'url' => action('\Devfactory\Menu\Controllers\MenuController@putUpdate', $menu->id), 'id' => 'app-create', 'class' => 'form')) !!}

    <div class="col-md-12">

      <!-- general form elements -->
      <div class="box box-primary">

        @include('menu::form')

          <div class="box-footer">
          {!! Form::submit(trans('general.buttons.save'), array('class' => 'btn btn-primary btn-flat')) !!}
        </div>

      </div>
    </div>
    {!! Form::close() !!}

    </div>
@stop
