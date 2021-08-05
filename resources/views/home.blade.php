@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->is_admin)
                    {{ __('Welcome, Admin!') }}
                        <div class="container">
                            <h1>All services</h1>
                            <a href="{{ route('admin.createService') }}" class="btn btn-link text-primary">Add new service</a>

                            <table class="table table-hover">
                            <thead>       
                                <th>Name</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Specialist</th>        
                            </thead>
                            <tbody>
                            
                            @foreach($services as $service)
                            <tr class="service-row" data-serviceid="{{$service->id}}">
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->price }}$</td>
                                <td>{{ $service->duration }}</td>
                                <td><a href="{{ route('admin.editService', ['service' => $service->id]) }}"class="btn btn-info">Edit</a>
                                    <a href="{{ route('admin.deleteService', ['service' => $service->id]) }}"class="btn btn-text text-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach       
                            </tbody>
                            </table>
                        </div>
                    @endif
                    <!--Тук да се види какво ще се случва ако не е админ-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
  const specialists = {!! json_encode($specialists) !!};

  const serviceRows = document.getElementsByClassName('service-row');
  for(let i = 0; i < serviceRows.length; i++) {
    const id = serviceRows[i].dataset.serviceid; 

    const specialistsForThatService = specialists.filter(function(specialist) {
      for(let j = 0; j < specialist.services.length; j++) {
        if(specialist.services[j].id === Number(id))
          return true;
      }

      return false;
    });

    const specialistNames = specialistsForThatService.map(function(specialist) {
      return specialist.name
    }).join(", ");

    const td = document.createElement("td");
    td.innerHTML = specialistNames;

    serviceRows[i].appendChild(td);
  }

</script>
@endsection
