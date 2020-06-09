@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  body{
    counter-reset: Serial;  /*set the serial counter to zero*/
  }
  table{
    border-collapse: separate;
  }
  tr td:first-child::before{
    counter-increment: Serial;
    content: counter(Serial);
  }
</style>

  <div class="card uper">

  <div class="card-header mt-3 tab-card">
    <a class="btn btn-primary" href="{{ route('trucks.create') }}"><strong> Add New truck  <i class="fa fa-fw fa-truck"> </i></strong></a>
    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
      <li class="nav-item">
          <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Assigned Trucks</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Unassigned Trucks</a>
      </li>
    </ul>
  </div>
 
  <div class="card-body">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
     <table class="table table-striped">
    <thead>
      
        <tr>
          <th>  SN </th>
          <th> Truck Model </th>
          <th> Plate Number </th>
          <th> Assigned To </th>
          <th colspan="3" class="text-center"> Action </th>
        </tr>
    </thead>
    <tbody>
        @foreach($trucks as $truck)
        <tr>
            <td></td>
            <td>{{$truck->truck_model}}</td>
            <td>{{$truck->plate_number}}</td>
            <td>{{$truck->driver_name}}</td>
            <td><a href="{{ route('trucks.edit',$truck->id)}}" class="btn btn-primary">Edit <i class="fa fa-fw fa-edit"> </i></a></td>
            {{-- <td><a class="btn btn-primary" href="{{ route('trucks.show',$truck->id) }}">Show <i class="fa fa-fw fa-eye"> </i></a></td> --}}
            <td><a class="btn btn-success" href="{{ route('trucks.operations',$truck->id) }}">Operations <i class="fa fa-fw fa-history"> </i></a></td>
            <td>
                <form action="{{ route('trucks.destroy', $truck->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to Delete this Record?')">Delete <i class="fa fa-fw fa-trash"> </i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    </div>

    <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
      <table class="table table-striped">
        <thead>
          
            <tr>
              <th>  SN </th>
              <th> Truck Model </th>
              <th> Plate Number </th>
              
              <th colspan="3" class="text-center"> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach($ntrucks as $ntruck)
            <tr>
                <td></td>
                <td>{{$ntruck->truck_model}}</td>
                <td>{{$ntruck->plate_number}}</td>
                
                <td><a href="{{ route('trucks.edit',$ntruck->id)}}" class="btn btn-primary">Edit <i class="fa fa-fw fa-edit"> </i></a></td>
                {{-- <td><a class="btn btn-primary" href="{{ route('trucks.show',$truck->id) }}">Show <i class="fa fa-fw fa-eye"> </i></a></td> --}}
                <td><a class="btn btn-success" href="{{ route('trucks.operations',$truck->id) }}">Operations <i class="fa fa-fw fa-history"> </i></a></td>
                <td>
                    <form action="{{ route('trucks.destroy', $truck->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to Delete this Record?')">Delete <i class="fa fa-fw fa-trash"> </i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>



    </div>

  </div>
  </div>
</div>
  
@endsection