@extends('layouts.app')

@section('content')


<div class="container">
    <a href="{{ URL::previous() }}" class="button tiny ">
        <i class="material-icons">&#xE314;</i></a>



    <div class="jumbotron text-center">
        <h2>{{ $player->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $player->email }}<br>
            <strong>Adress:</strong> {{ $player->adress }}<br>
            <strong>City:</strong> {{ $player->city }}<br>
            <strong>Answer:</strong> {{ $player->word }}<br>
            <strong>period:</strong>{{$player->period}}<br>
            <strong>Play date:</strong> {{ $player->created_at }}<br>
            <strong>IP Adress:</strong> {{ $player->ip_adress }}
        </p>

    </div>

</div>



@endsection