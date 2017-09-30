@extends('layouts.app')

@section('content')
<div class="container">
              <h1>Wedstrijd</h1>


              <form class="form-horizontal" method="POST" action="{{ route('addword') }}">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('word') ? ' has-error' : '' }}">
                      <label for="word" class="col-md-4 control-label">woord</label>

                      <div class="col-md-6">
                          <input id="word" type="word" class="form-control" name="word" value="{{ old('word') }}" required autofocus>

                          @if ($errors->has('word'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('word') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-8 col-md-offset-4">
                          <button type="submit" class="btn btn-primary">
                              Verzenden
                          </button>
                      </div>
                  </div>
              </form>

</div>
@endsection
