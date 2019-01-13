@extends('layouts.app')

@include ('layouts.nav')

@section('content')
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="/insulins" enctype="multipart/form-data" class="upper-form text-center">
    {{ csrf_field() }}

    <div class="container"  id="lower-form">
      <div class="row justify-content-center">
        <div class="col-md-6">

          <strong>Insulin Aplication: </strong>
          <div class="form-group">
            <label for="dose">Insulin dose</label>
            <input type="number" name="dose" min="0.1" step="0.1" placeholder="Enter Insulin Dose" class="form-control"/>
          </div>
          <div class="form-group">
            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
              <label for="time"  class="time">Aplication Time: </label>
              <input type="text" name="time" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
              <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
            <input type="submit" class="time-form"/>
          </div>
        </div>
        <script type="text/javascript">
          $(function () {
            $('#datetimepicker1').datetimepicker({
              format: 'DD.MM.YYYY HH:mm:ss',
              date: moment()
            });
          });
        </script>
      </div>
    </div>


  </form>
  <div class="container text-center panel">
    <div class="col-md-offset-3">
      <p><strong>Insulins:</strong></p>
      <ul>
        @foreach ($insulins as $insulin)
          <li><p><strong class="unit">{{ ($insulin->dose)/10 }}</strong> units on <em>{{ $insulin->time }}</em></p></li>
        @endforeach
      </ul>
    </div>
  </div>

  <div class="d-flex justify-content-center">
    {{ $insulins->links() }}
  </div>

@endsection

@include ('layouts.footer')
