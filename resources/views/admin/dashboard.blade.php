@extends('layouts.app')

@section('content')
<h1> Admin dashboard</h1>
<a href="{{ route('schedule.index') }}" class="btn btn-link">Schedule</a>
@endsection