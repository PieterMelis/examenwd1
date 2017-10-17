@extends('layouts.app')

@section('content')



    <h1>View players</h1>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>adress</td>

            <td>city</td>
            <td>word</td>
        </tr>
        </thead>
        <tbody>
        @foreach($players as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->adress }}</td>
                <td>{{ $value->city }}</td>
                <td>{{ $value->word }}</td>

                <td>


                    {{ Form::open(array('url' => 'delete/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'post') }}
                    {{ Form::submit('disqualification', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                <a class="btn btn-small btn-success" href="{{ URL::to('players/' . $value->id) }}">Show this player</a>

                </td>
            </tr>


        @endforeach
        </tbody>
    </table>




@endsection