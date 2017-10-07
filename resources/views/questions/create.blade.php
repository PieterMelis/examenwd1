@extends('layouts.app')

@section('content')


    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <h2>Vraag aanmaken</h2>












@endsection
