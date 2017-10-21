@extends('layouts.app')

@section('content')


<div class="container">
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
        </tr>
        </thead>
        <tbody>
        @foreach($winners as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>



            </tr>


        @endforeach
        </tbody>
    </table>
</div>





@endsection