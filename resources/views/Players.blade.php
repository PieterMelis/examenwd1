@extends('layouts.app')

@section('content')


<div class="container">
    <a href="{{ URL::previous() }}" class="button tiny ">
        <i class="material-icons">&#xE314;</i></a>
    <h1>View players</h1>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>name</td>
            <td>email</td>
            <td>adress</td>
            <td>city</td>
            <td>Answer</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach($players as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->adress }}</td>
                <td>{{ $value->city }}</td>
                <td>{{ $value->word }}</td>

                <td>


                    {{ Form::open(array('url' => 'delete/' . $value->id)) }}
                    {{ Form::hidden('_method', 'post') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                    <a class="btn btn-small btn-success" href="{{ URL::to('players/' . $value->id) }}">Detail</a>

                </td>
            </tr>


        @endforeach
        </tbody>
    </table>
</div>





@endsection