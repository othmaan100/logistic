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
    <a class="btn btn-primary" href="{{ route('clients.create') }}">  Add New client  </a>
  </div>
 
  <div class="card-body col-md-12">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
     <table class="table table-striped table-responsive" width="100%">
    <thead>
     
    
     
        <tr>
          <th>SN</th>
          <th>Client Name</th>
          <th>  Phone Number</th>
          <th>  Address </th>
          <th colspan="4" class="text-center">Action </th>
        </tr>
      
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td></td>
            <td>{{$client->client_name}}</td>
            <td>{{$client->client_phone}}</td>
            <td>{{$client->client_address}}</td>
            <td><a href="{{ route('clients.edit',$client->id)}}" class="btn btn-primary">Edit <i class="fa fa-fw fa-edit"> </i></a></td>
            {{-- <td><a class="btn btn-secondary" href="{{ route('clients.show',$client->id) }}">Show <i class="fa fa-fw fa-eye"> </i></a></td> --}}
            <td><a class="btn btn-success" href="{{ route('clients.transactions',$client->id) }}">Transactions <i class="fa fa-fw fa-history"> </i></a></td>
            <td>
                <form action="{{ route('clients.destroy', $client->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to Delete the Client Record?')">Delete <i class="fa fa-fw fa-trash"> </i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
  
@endsection