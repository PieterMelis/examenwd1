@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ URL::previous() }}" class="button tiny ">
        <i class="material-icons">&#xE314;</i></a>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif



    {{ Html::ul($errors->all()) }}

    {{ Form::model($period, array('url' => array('editPeriod', $period->id), 'method' => 'post')) }}

    <div class="form-group">
        {{ Form::label('periodname', 'Periodname') }}
        {{ Form::text('periodname', null, ['class' => 'form-control', 'readonly' => 'true']) }}
    </div>

    <div class="form-group">
        {{ Form::label('startdate', 'Startdate') }}
        {{ Form::text('startdate', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('enddate', 'Enddate') }}
        {{ Form::text('enddate', null,['class' => 'form-control']) }}
    </div>


    {{ Form::submit('Edit the date', array('class' => 'button')) }}

    {{ Form::close() }}
</div>







@endsection