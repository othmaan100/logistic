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

  <div class="card-header">
    <a class="btn btn-primary" href="{{ route('drivers.create') }}"> <strong> Add New Driver <i class="fa fa-fw fa-user"> </i></strong></a>
  </div>
 
  <div class="card-body">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
     <table class="table table-striped">
    <thead>
        <tr>
          <th>SN</th>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Address</th>
          <th colspan="4" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($drivers as $driver)
        <tr>
          <td></td>
            <td>{{$driver->driver_id_no}}</td>
            <td>{{$driver->driver_name}}</td>
            <td>{{$driver->driver_phone}}</td>
            <td>{{$driver->driver_address}}</td>
            <td><a href="{{ route('drivers.edit',$driver->driver_id)}}" class="btn btn-primary">Edit <i class="fa fa-fw fa-edit"> </i></a></td>
            <td><a class="btn btn-secondary" href="{{ route('drivers.show',$driver->driver_id) }}">Show <i class="fa fa-fw fa-eye"> </i></a></td>
            <td><a class="btn btn-success" href="{{ route('drivers.tasks',$driver->driver_id) }}">Tasks <i class="fa fa-fw fa-tasks"> </i></a></td>
            <td>
                <form action="{{ route('drivers.destroy', $driver->driver_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to delete this record')">Delete  <i class="fa fa-fw fa-trash"> </i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
  <div class="col-offset-9">
    <span class="fa-pull-right">
    {{$drivers->links()}}  <!-- Help in giving out links for paginated data-->
    </span>
    
    </div>

</div>
  
@endsection