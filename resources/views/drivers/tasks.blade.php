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

/*   table, th, td
{
  border-collapse:collapse;
  border: 1px solid black;
  width:100%;
  text-align:right;
} */
</style>

  <div class="card uper">
    <a class="btn btn-primary" href="{{ route('drivers.index') }}"> <i class="fa fa-arrow-left"></i> List of Drivers</a>

  <div class="card-header">
        
</div>
 
  <div class="card-body">
      <h4 class="text-center">Driver's Task History</h4>
      <hr>
    <div class="row">
     
        <div class="col-md-2 font-weight-bold">Full Name:</div> <div class="col-md-5">{{$driver->driver_name}}</div> 
    </div>
    <div class="row">
        <div class="col-md-2 font-weight-bold">Address:</div> <div class="col-md-5">{{$driver->driver_address}}</div>
    </div>
    <div class="row">
            <div class="col-md-2 font-weight-bold">Phone Number:</div> <div class="col-md-5">{{$driver->driver_phone}}</div>
    </div>

    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
    
  @endif
  @if(count($tasks)>0)
  
  <div class="container">
    
      <table class="table table-striped table-responsive" width="100%"> 
       
    <thead>
     
    
     
        <tr>
          <th>SN</th>
          <th>Good ID</th>
          <th>Good Type</th>
          <th>Pickup Point</th>
          <th>Delivery Point</th>
          <th>Cost of Good</th>
          <th>Date</th>
          </tr>
      
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td></td>
            <td>{{$task->good_id_no}}</td>
            <td>{{$task->good_type}}</td>
            <td>{{$task->good_pickup_point}}</td>
            <td>{{$task->good_delivery_point}}</td>
            <td>₦{{number_format($task->good_cost,2)}}</td>
            <td>{{$task->good_date_of_pickup}}</td>
            <td><a class="btn btn-danger" href="{{ route('drivers.taskdetails',$task->good_id) }}">View Expenses Details </a></td>

        </tr>
        @endforeach
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        {{-- <th>₦{{number_format($total_cost,2)}}</th> --}}
          <th></th>
        </tr>
    </tbody>
  </table>
  
    </div>
  @else 
  <br>  
  <p class="text-info ">No Transaction Recorded</p>
@endif
  </div>
</div>




<script>
    $(document).ready(function(){
    
    
    
    });
    
    
    </script>
@endsection

