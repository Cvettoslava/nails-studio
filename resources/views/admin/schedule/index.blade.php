@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Schedule index</h1>
    <a href="{{ route('schedule.create') }}" class="btn btn-link text-primary">Add</a>

    <table class="table table-hover">
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Service</th>
        <th>Date</th>
        <th>Actions</th>
      </thead>
      <tbody>
        @foreach($sessions as $session)
        <tr>
          <td>{{ $session->id }}</td>
          <td>{{ $session->name }}</td>
          <td>{{ $session->phone }}</td>
          <td>{{ $session->service }}</td>
          <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $session->scheduled_time)->format('d M Y H:i') }}</td>
          <td><a href="{{ route('schedule.edit', ['schedule' => $session->id]) }}" class="btn btn-info">Edit</a>
              <a href="{{ route('schedule.delete', ['schedule' => $session->id]) }}" class="btn btn-text text-danger">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{ $sessions->links() }}
  </div>
@endsection