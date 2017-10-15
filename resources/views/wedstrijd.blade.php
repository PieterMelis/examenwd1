@extends('layouts.app')

@section('content')
<div class="container">
              <h1>Wedstrijd</h1>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>


    @endif


    {{ Html::ul($errors->all(),array('class' => 'errors')) }}

    {{ Form::open(['url' => 'PlayerSend']) }}



    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'),  array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('adress', 'Adress') }}
        {{ Form::text('adress', Input::old('adress'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('city', 'City') }}
        {{ Form::text('city',  Input::old('city'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('word', 'Word') }}
        {{ Form::text('word',  Input::old('word'), array('class' => 'form-control') )}}
    </div>

    {{ Form::submit('Verzenden', array( 'class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
@endsection
