@extends('layouts.app')

@section('content')


    <div class="hero-section">
        <div class="coverBlack">
            <div class="hero-section-text">
                @foreach($question as $key => $value)
                    @if($value->id === 1)
                        <h1>{{$value->question }}</h1>
                    @else
                        <div>No questions found</div>
                    @endif
                @endforeach
                    You can participate until {{$dTime}}
            </div>
        </div>
    </div>

<div class="container">


    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif


    {{ Html::ul($errors->all(),array('class' => 'alert alert-danger')) }}

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
        {{ Form::label('word', 'Answer') }}
        {{ Form::text('word',  Input::old('word'), array('class' => 'form-control') )}}
    </div>

    {{ Form::submit('Verzenden', array( 'class' => 'btn btn-primary')) }}

    {{ Form::close() }}<br>

</div>
@endsection
