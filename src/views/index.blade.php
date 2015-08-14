@extends($layout->extends)

{{-- Page title --}}
@section($layout->header)
  <h1>@lang('menu::menu.page_title')</h1>
@stop

@section($layout->content)

@section('content')

  <div class="row">
    <div class="col-sm-12">
        {!! Form::open(array('method'=>'GET', 'url' => action('\Devfactory\Menu\Controllers\MenuController@getCreate'))) !!}
        {!! Form::submit(trans('general.buttons.add'), array('class' => 'btn btn-primary btn-flat margin-bottom')) !!}
        {!! Form::close() !!}
   </div>
  </div>

  <div class="row">
    <div class="col-sm-12">

      <div class="box">

        <div class="box-header">

          <h3 class="box-title">Menu</h3>

        </div><!-- /.box-header -->

        <div class="box-body">

          @if ($menus->isEmpty())
            Aucune entrée de menu trouvée
          @else
            <ul class="todo-list" data-model="Menus">
              @foreach ($menus as $menu)
                <li id="content_id_{{ $menu->id }}">
                  <!-- drag handle -->
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <!-- checkbox -->
                  <!-- todo text -->
                  <span class="text">{{ $menu->title }}</span>
                  <!-- Emphasis label -->
                  <!-- General tools such as edit or delete-->
                  <div class="pull-right">
                      <div class="btn-group">
                          {!! Form::open(array('method'=>'GET', 'url' => action('\Devfactory\Menu\Controllers\MenuController@getEdit', $menu->id))) !!}
                          {!! Form::submit(trans('general.buttons.edit'), array('class' => 'btn btn-xs btn-primary btn-flat')) !!}
                          {!! Form::close() !!}
                      </div>
                      <div class="btn-group">
                          {!! Form::open(array('method'=>'DELETE', 'url' => action('\Devfactory\Menu\Controllers\MenuController@deleteDestroy', $menu->id))) !!}
                          {!! Form::submit(trans('general.buttons.delete'), array('class' => 'delete-confirm-dialog btn btn-xs btn-danger btn-flat')) !!}
                          {!! Form::close() !!}
                      </div>
                  </div>
                </li>
              @endforeach
            </ul>
          @endif

        </div>
      </div>
    </div>
  </div>
@stop
