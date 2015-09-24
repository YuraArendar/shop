@extends('administration::layout.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">

                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                    <h2 class="panel-title">Edit {{ @$structure['lang']['name'] }} </h2>
                </header>
                <div class="panel-body">

                    {!! Form::open(['method'=>'PATCH','class'=>'form-horizontal form-bordered','url'=>action('\Administration\Http\Controllers\StructureController@update',['id'=>@$structure['id']])]) !!}
                    @include('administration::structure.form')
                    {!! Form::close() !!}

                </div>
            </section>
        </div>
    </div>
@endsection