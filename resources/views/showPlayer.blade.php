@extends('layouts.app')

@section('content')





    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif



        <div class="jumbotron text-center">
            <h2>{{ $player->name }}</h2>
            <p>
                <strong>Email:</strong> {{ $player->email }}<br>
                <strong>Adress:</strong> {{ $player->adress }}<br>
                <strong>City:</strong> {{ $player->city }}<br>
                <strong>Answer:</strong> {{ $player->word }}<br>
                <strong>Play date:</strong> {{ $player->created_at }}<br>
                <strong>IP Adress:</strong> {{ $player->ip_adress }}
            </p>

        </div>


@endsection