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
                            {!! link_to_action('\Administration\Http\Controllers\StructureController@create',"Add",array(),['class'=>'btn btn-primary']) !!}

                        </div>
                    </div>
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