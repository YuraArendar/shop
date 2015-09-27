@extends('administration::layout.layout')

@section('content')

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

@endsection