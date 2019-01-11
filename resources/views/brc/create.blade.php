@extends('main')

@section('css')
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
@stop

@section('content')
<div class="contM">
  <form class="" action="{{ route('brcs.store')}}" method="post">
      @csrf
      @foreach (range(0, 19) as $x)
      <div class="row">
          <div class=" col-xs-3 form-group {{ $errors->has('brcs.' . $x)? 'has-error' : ''}}">
              <span for="bark-{{ $x }}">Mac {{ $x }}</span>
              <input class="form-control" id="bark-{{ $x }}" type="text" name="brcs[]"/>
              @if ($errors->has('brcs.' . $x))
                <span class="help-block">
                  {{ $errors->first('brcs.' . $x)}}
                </span>
              @endif
          </div>
      </div>
      @endforeach
    <button type="submit" class="btn btn-primary" name="button">Submit</button>
  </form>
</div>


@endsection
