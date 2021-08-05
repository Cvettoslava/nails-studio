@extends('layouts.app')

@section('content')
<h1> Admin dashboard</h1>

<a href="{{ route('schedule.index') }}" class="btn btn-link">Schedule</a>
<a href="{{ route('home') }}" class="btn btn-link">Edit information about services, specialists and etc.</a>
@endsection