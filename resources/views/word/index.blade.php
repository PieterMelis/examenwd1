@extends('layouts.app')

@section('content')


    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif







@endsection
