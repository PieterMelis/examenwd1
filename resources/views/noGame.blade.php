@extends('layouts.app')

@section('content')
    <div class="errorr">
        <div class="hero-section">
            <div class="coverBlack">
                <div class="hero-section-text">
                    <h1>No quiz game today, try again later</h1>
                    <div class="links">
                        <a href="{{ url('/') }}" class="hollow button">Back</a>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
