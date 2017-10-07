@extends('layouts.app')

@section('content')
<div class="container">
              <h1>Wedstrijd</h1>


    {{ Form::open(array('url' => 'word')) }}



    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('adress', 'Adress') }}
        {{ Form::text('adress', Input::old('adress'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', Input::old('city'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('vraag 1') }}
        {{ Form::text('question', Input::old('question'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('word', 'Word') }}
        {{ Form::text('word', 'word'), array('class' => 'form-control') }}
    </div>

    {{ Form::submit('Verzenden', array( 'class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
@endsection
