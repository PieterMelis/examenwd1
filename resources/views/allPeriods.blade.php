@extends('layouts.app')

@section('content')



<div class="container">
    <a href="{{ URL::previous() }}" class="button tiny ">
        <i class="material-icons">&#xE314;</i></a>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <br>

                <table class="table-expand">
                    <thead>
                    <tr class="table-expand-row">
                        <th width="50%">Name</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($periods as $key => $value)
                    <tbody>
                    <tr class="table-expand-row" data-open-details>
                        <td>{{ $value->periodname }}</td>
                        <td>{{ $value->startdate }}</td>
                        <td>{{ $value->enddate }}</td>
                        <td><a href="{{ URL::to('period/' . $value->id . '/edit') }}">Edit</a></td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>






</div>




@endsection