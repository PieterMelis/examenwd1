@extends('layouts.app')

@section('content')
<div class="container">
              <h1>Wedstrijd</h1>


    {{ Form::open(array('url' => 'word')) }}

    <div class="form-group">
        {{ Form::label('word', 'Word') }}
        {{ Form::text('word', 'word'), array('class' => 'form-control') }}
    </div>


    {{ Form::submit('Verzenden', array( 'class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
@endsection
