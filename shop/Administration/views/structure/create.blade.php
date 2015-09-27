@extends('administration::layout.layout')

@section('content')

    {!! Form::open([
    'method'=>'POST',
    'class'=>'form-horizontal form-bordered',
    'onsubmit'=>'return Main.submitForm(this)',
    'url'=>action('\Administration\Http\Controllers\StructureController@postStore')
    ]) !!}
        @include('administration::structure.form')
    {!! Form::close() !!}


@endsection