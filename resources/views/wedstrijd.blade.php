@extends('layouts.app')

@section('content')
<div class="container">
              <h1>Wedstrijd</h1>

    {{ Form::open(['url' => 'ParticipansSend']) }}



    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email',  array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('adress', 'Adress') }}
        {{ Form::text('adress', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('city', 'City') }}
        {{ Form::text('city',  array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('word', 'Word') }}
        {{ Form::text('word', 'word'), array('class' => 'form-control') }}
    </div>

    {{ Form::submit('Verzenden', array( 'class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
@endsection
