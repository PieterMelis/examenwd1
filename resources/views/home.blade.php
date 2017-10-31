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
                            <a href="{{ route('register') }}" class="button expand">
                                <i class="material-icons">&#xE7FE;</i>
                                <h6>Add admin</h6>
                            </a>
                        </div>
                        <div class="adminBlock">
                            <a href="{{ url('/playersView') }}" class="button expand">
                                <i class="material-icons">&#xE7FB;</i>
                                <h6>view players</h6>
                            </a>
                        </div>

                        <div class="adminBlock">
                            <a href="{{ url('/allPeriods') }}"class="button expand">
                                <i class="material-icons">&#xE192;</i>
                                <h6>All periods</h6>
                            </a>
                        </div>
                        <div class="adminBlock">
                            <a href="{{ url('/question') }}"class="button expand">
                                <i class="material-icons">&#xE8AF;</i>
                                <h6>add question</h6>
                            </a>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
