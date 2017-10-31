@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{ URL::previous() }}" class="button tiny ">
            <i class="material-icons">&#xE314;</i></a>
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

            @foreach($question as $key => $value)
                @if($value->id === 1)

                   {{ Html::ul($errors->all()) }}

                    {{ Form::model($value, array('url' => array('editQuestion', $value->id ), 'method' => 'post')) }}

                    <div class="form-group">
                        {{ Form::label('question', 'Question') }}
                        {{ Form::text('question', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('answer', 'Answer') }}
                        {{ Form::text('answer', null, ['class' => 'form-control']) }}
                    </div>




                    {{ Form::submit('Edit question', array('class' => 'button')) }}

                    {{ Form::close() }}
                @else
                    <div class="alert alert-info">No questions found</div>
                @endif



    </div>

            @endforeach


@endsection