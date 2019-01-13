
@extends('layouts.app')

@include ('layouts.nav')

@section('content')

  {{--@include ('layouts.nav')--}}
{{--<strong>Enter sugar in blood:</strong>--}}
<form method="POST" action="/sugars" enctype="multipart/form-data" class="upper-form text-center">
  {{ csrf_field() }}
  {{--<label for="value">Sugar In Blood: </label>
  <input type="number" name="value" placeholder="Enter Sugar Value"/><br>

  <label for="time">Measurement Time: </label>
  <input type="datetime-local" name="time"/><br>--}}

  <div class="container" id="lower-form">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <strong>Enter sugar in blood:</strong>
        <div class="form-group">
          <label for="value">Sugar In Blood: </label>
          <input type="number" name="value" min="0.1" step="0.1" placeholder="Enter Sugar Value" class="form-control"/><br>
        </div>
        <div class="form-group">
          <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
            <label for="time"  class="time">Measurement Time: </label>
            <input type="datetime" name="time" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
          </div>
          <input type="submit" class="time-form"/>
        </div>
      </div>
      <script type="text/javascript">
        $(function () {
          $('#datetimepicker1').datetimepicker();
        });
      </script>
    </div>
  </div>


</form>
    <div class="container text-center panel">
      <div class="col-md-offset-3">
        <p><strong>Sugars:</strong></p>
          <ul>
            @foreach ($sugars as $sugar)
              <li><p><strong class="unit"> {{ ($sugar->value)/10 }} </strong> mmol/L on {{ $sugar->time }}</p></li>
            @endforeach
          </ul>
      </div>
      <p>Average: {{ $avgSugar/10 }} </p>
    </div>



@endsection

@include ('layouts.footer')
