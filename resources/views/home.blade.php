
@extends('layouts.app')

@include ('layouts.nav')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      {{ Auth::user()->name }} you are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center p-2">
  <p>Pick Date: <input name="date" type="text" id="datepicker"></p>
  <a href="/date/date">
    View selected day results
  </a>
  {{--<input type="submit" class="time-form"/>--}}
  <script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
  </script>
</div>

{{--<div class="col-md-8 text-center panel">--}}
  <div class="row justify-content-center">
    {{--<div class="col-md-8 panel">--}}
      <div class="col-md-3 text-center panel">
        <p><strong>Sugars:</strong></p>
        <ul>
          @foreach ($sugars as $sugar)
            <li><p><strong class="unit"> {{ ($sugar->value)/10 }} </strong> mmol/L on {{ $sugar->time }}</p></li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-3 text-center panel">
        <p><strong>Insulins:</strong></p>
        <ul>
          @foreach ($insulins as $insulin)
            <li><p><strong class="unit">{{ ($insulin->dose)/10 }}</strong> units on <em>{{ $insulin->time }}</em></p></li>
          @endforeach
        </ul>
      </div>

    {{--</div>--}}
  </div>
{{--</div>--}}



@endsection

@include ('layouts.footer')