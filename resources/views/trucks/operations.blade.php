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
    <a class="btn btn-primary" href="{{ route('trucks.index') }}"> Back</a>

  <div class="card-header">
     </div>
 
  <div class="card-body">
    <h4 class="text-center">Transport History</h4>
    <hr>
  <div class="row">
   
      <div class="col-md-2 font-weight-bold">Truck Model:</div> <div class="col-md-5">{{$truck->truck_model}}</div> 
  </div>
  <div class="row">
      <div class="col-md-2 font-weight-bold">Plate Number:</div> <div class="col-md-5">{{$truck->plate_number}}</div>
  </div>
 

    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
    
  @endif
  @if(count($goods)>0)
     <table class="table table-striped">
    <thead>
        <tr>
          <th></th>
          <th>Goods ID</th>
          <th>Goods Type</th>
          <th>Pickup Location</th>
          <th>Good Delivery Location</th>
          <th>Good Cost</th>
          </tr>
    </thead>
    <tbody>
        @foreach($goods as $good)
        <tr>
            <td></td>
            <td>{{$good->good_id_no}}</td>
            <td>{{$good->good_type}}</td>
            <td>{{$good->good_pickup_point}}</td>
            <td>{{$good->good_delivery_point}}</td> 
            <td>₦{{number_format($good->good_cost,2)}}</td>
        </tr>
        @endforeach
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>₦{{number_format($total_cost,2)}}</th>
        
        </tr>
    </tbody>
     </table>
     @else
    <p class="text-info">No Record of Operation Obtained!!!</p>
 @endif
  </div>
</div>
  
@endsection