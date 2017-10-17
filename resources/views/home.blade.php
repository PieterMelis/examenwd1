@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="adminBlock">
                            <a href="{{ route('register') }}">
                                <img src="{{ asset('img/admin.png') }}">
                                <h6>Add admin</h6>
                            </a>
                        </div>
                        <div class="adminBlock">
                            <a href="{{ url('/playersView') }}">
                                <img src="{{ asset('img/player.png') }}">
                                <h6>view players</h6>
                            </a>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
