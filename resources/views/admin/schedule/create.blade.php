@extends('layouts.app')
 
@section('content')
<div class="container">
    <a href="{{ route('schedule.index') }}" class="btn btn-link text-secondary">Go Back</a>
    @if (isset($errors))
    <ul>
      @foreach ($errors->all() as $message)
        <li>
          {{$message}}
        </li>
      @endforeach
    </ul>
    @endif 
    <form action="{{ route('schedule.store') }}" method="POST">
      @csrf <!--Cross Site Reference Forgery (CSRF) token-->
 
      <div class="field-group">
        <label for="name">Client name</label>
        <input required class="form-control" type="text" name="name" placeholder="Enter name">
      </div>
      <div class="field-group">
        <label for="phone">Client phone</label>
        <input required class="form-control" type="text" name="phone" placeholder="08...">
      </div>
      <div class="field-group">
        <div><label for="service">Service</label></div>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-primary">
            <input value="Basic Polish" type="radio" name="service" id="option1" autocomplete="off" checked=""> Basic Polish
          </label>
          <label class="btn btn-primary">
            <input value="Shellac" type="radio" name="service" id="option2" autocomplete="off"> Shellac
          </label>
          <label class="btn btn-primary active">
            <input value="Acrylic" type="radio" name="service" id="option3" autocomplete="off"> Acrylic
          </label>
        </div>
      </div>
      <div class="field-group">
        <label for="scheduled_time">Select date</label>
        <input type="text" class="form-control datetimepicker" name="scheduled_time">
      </div>
      <div class="field-group">
        <label for="time">Select time</label>
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
          
        </div>
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
          <div style="margin-right: 1em; margin-bottom: 1em" class="btn-group btn-group-toggle" role="group" aria-label="Before lunch" data-toggle="buttons">
            <label type="button" class="btn btn-secondary">
              <input type="radio" name="time" value="08:00" autocomplete="off" checked>
              8:00
            </label>
            <label type="button" class="btn btn-secondary">
              <input type="radio" name="time" value="09:00" autocomplete="off">
              9:00
            </label>
            <label type="button" class="btn btn-secondary">
              <input type="radio" name="time" value="10:00" autocomplete="off">
              10:00
            </label>
            <label type="button" class="btn btn-secondary">
              <input type="radio" name="time" value="11:00" autocomplete="off">
              11:00
            </label>
            <label type="button" class="btn btn-secondary">
              <input type="radio" name="time" value="12:00" autocomplete="off">
              12:00
            </label>
            <label type="button" class="btn btn-secondary">
              <input type="radio" name="time" value="13:00" autocomplete="off">
              13:00
            </label>
            <label type="button" class="btn btn-secondary">
              <input type="radio" name="time" value="14:00" autocomplete="off">
              14:00
            </label>
            <label type="button" class="btn btn-secondary">
              <input type="radio" name="time" value="15:00" autocomplete="off">
              15:00
            </label>
            <label type="button" class="btn btn-secondary">
              <input type="radio" name="time" value="16:00" autocomplete="off">
              16:00
            </label>
            <label type="button" class="btn btn-secondary">
              <input type="radio" name="time" value="17:00" autocomplete="off">
              17:00
            </label>
          </div>
        </div>
      </div>
      <div class="field-group">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
@endsection
 
@section('scripts')
 
<script>
  window.addEventListener('load', function() {
    $('.datetimepicker').datepicker({format: 'dd.mm.yyyy'});
  })
</script>
 
@endsection