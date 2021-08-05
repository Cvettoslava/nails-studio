@extends('layouts.app')
 
@section('content')
<div class="container">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-link text-secondary">Go Back</a>
    @if (isset($errors))
    <ul>
      @foreach ($errors->all() as $message)
        <li>
          {{$message}}
        </li>
      @endforeach
    </ul>
    @endif 
    <form action="{{ route('admin.storeService') }}" method="GET">
      @csrf <!--Cross Site Reference Forgery (CSRF) token-->
 
      <div class="field-group">
        <label for="name">Name of the service</label>
        <input required class="form-control" type="text" name="name" placeholder="Enter name">
      </div>
      <div class="field-group">
        <label for="price">Service`s price</label>
        <input required class="form-control" type="text" name="price" placeholder="x$">
      </div>
      <div class="field-group">
        <label for="duration">Service`s duration</label>
        <input required class="form-control" type="text" name="duration" placeholder="..h">
      </div>
      <div class="field-group">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
@endsection
 
