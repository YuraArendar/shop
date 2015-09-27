@extends('administration::layout.layout')

@section('content')


    {!! Form::open([
    'method'=>'PATCH',
    'class'=>'form-horizontal form-bordered',
    'onsubmit'=>'return Main.submitForm(this)',
    'url'=>action('\Administration\Http\Controllers\StructureController@update',
    ['id'=>@$structure['id']])
    ]) !!}

    @include('administration::structure.form')

    {!! Form::close() !!}

@endsection