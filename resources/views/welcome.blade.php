@extends('layouts.app')

@section('content')
<div class= "container">
    <h1>Latest records</h1>

    <div class="row">
        @foreach($sessions as $session)
            <div class="col-sm-4">
                <div class="card border-secondary mb-3" style="max-width: 20rem;">
                    <div class="card-header bg-primary text-white">{{$session->name}}</div>
                    <div class="card-body">
                        <p class="card-text">
                            <strong>Service</strong>: {{$session->service->name}} <br>
                            <strong>Phone</strong>: {{$session->phone}} <br>
                            <strong>Date</strong>: {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $session->scheduled_time)
                            ->format('d M Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection('content')