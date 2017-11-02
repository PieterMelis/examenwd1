@extends('layouts.app')

@section('content')


<div class="container">
    <a href="{{ URL::previous() }}" class="button tiny ">
        <i class="material-icons">&#xE314;</i></a>
    <h1>View players</h1>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::open(array('url' => array('downloadExel'), 'method' => 'post')) !!}
    {{ Form::submit('Download Excel', array('class' => 'button pull-right')) }}
    {!! Form::close() !!}



    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Period 1</a></li>
        <li><a data-toggle="tab" href="#menu1">Period 2</a></li>
        <li><a data-toggle="tab" href="#menu2">Period 3</a></li>
        <li><a data-toggle="tab" href="#menu3">Period 4</a></li>
        <li><a data-toggle="tab" href="#winners">Winners</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="players">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td>name</td>
                        <td>email</td>
                        <td>period</td>
                        <td>Answer</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($players1 as $key => $value)
                        <tr>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->period }}</td>
                            <td>{{ $value->word }}</td>

                            <td>


                                {{ Form::open(array('url' => 'delete/' . $value->id)) }}
                                {{ Form::hidden('_method', 'post') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                                {{ Form::close() }}

                                <a class="btn btn-small btn-success" href="{{ URL::to('players/' . $value->id) }}">Detail</a>

                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="players">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td>name</td>
                        <td>email</td>
                        <td>period</td>
                        <td>Answer</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($players2 as $key => $value)
                        <tr>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->period }}</td>
                            <td>{{ $value->word }}</td>

                            <td>


                                {{ Form::open(array('url' => 'delete/' . $value->id)) }}
                                {{ Form::hidden('_method', 'post') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                                {{ Form::close() }}

                                <a class="btn btn-small btn-success" href="{{ URL::to('players/' . $value->id) }}">Detail</a>

                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="players">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td>name</td>
                        <td>email</td>
                        <td>period</td>
                        <td>Answer</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($players3 as $key => $value)
                        <tr>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->period }}</td>
                            <td>{{ $value->word }}</td>

                            <td>


                                {{ Form::open(array('url' => 'delete/' . $value->id)) }}
                                {{ Form::hidden('_method', 'post') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                                {{ Form::close() }}

                                <a class="btn btn-small btn-success" href="{{ URL::to('players/' . $value->id) }}">Detail</a>

                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>        </div>
        <div id="menu3" class="tab-pane fade">
            <div class="players">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td>name</td>
                        <td>email</td>
                        <td>period</td>
                        <td>Answer</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($players4 as $key => $value)
                        <tr>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->period }}</td>
                            <td>{{ $value->word }}</td>

                            <td>


                                {{ Form::open(array('url' => 'delete/' . $value->id)) }}
                                {{ Form::hidden('_method', 'post') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                                {{ Form::close() }}

                                <a class="btn btn-small btn-success" href="{{ URL::to('players/' . $value->id) }}">Detail</a>

                            </td>
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="winners" class="tab-pane fade">
            <div class="players">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td>name</td>
                        <td>period</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($winners as $key => $value)
                        <tr>
                            <td>{{ $value->player }}</td>
                            <td>{{ $value->period }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>









</div>





@endsection