@extends('administration::layout.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>
                    <h2 class="panel-title">Structure</h2>
                </header>
                <div class="panel-body">
                    <div class="col-sm-6">
                        <div class="mb-md">
                            {!! link_to_action('\Administration\Http\Controllers\StructureController@create','Add',array(),['class'=>'btn btn-primary']) !!}

                        </div>
                    </div>
                    {!! Form::open(['method' => 'DELETE', 'id' => 'formDeleteProduct', 'action' => ['\Administration\Http\Controllers\StructureController@destroy', 4]]) !!}
                    {!! Form::button( '<i class="fa fa-trash fa-lg"></i>', ['type' => 'submit', 'class' => 'delete text-danger deleteProduct','id' => 'btnDeleteProduct', 'data-id' => 4 ] ) !!}
                    {!! Form::close() !!}
                    <div class="col-md-12">
                        <div class="dd" id="nestable">

                            {!! $view !!}

                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection