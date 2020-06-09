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
  
</div>
 
  <div class="card-body">
      <div class="row justify-content-md-center">
    <img src="{{asset('imgs/invoiceheader.png')}}" alt="">
</div> 
<hr class="my-4"/> 
<div class="offset-md-4 ">
    
    <h4 class=" display-6 font-weight-bold text-uppercase">Transaction History</h4>
      
    </div>
   
      <div class="row">
      
          <div class="col align-self-end offset-md-8">
        <label for="Balance" class="font-weight-bold col-md-6">Bulky Advance: ₦ </label><input type="text" class="col-md-6" name="bulky_advance" value="{{number_format($client->bulky_advance,2)}}" id="Balance" disabled>
      <label for="Balance" class="font-weight-bold col-md-6">Balance: ₦ </label><input type="text" class="col-md-6" name="Balance" value="{{number_format($client->bulky_advance-$total_cost,2)}}" id="Balance" disabled>
    </div>
    </div>
      
    <div class="row">
     
        <div class="col-md-2 font-weight-bold">Full Name:</div> <div class="col-md-5">{{$client->client_name}}</div> 
    </div>
    <div class="row">
        <div class="col-md-2 font-weight-bold">Address:</div> <div class="col-md-5">{{$client->client_address}}</div>
    </div>
    <div class="row">
            <div class="col-md-2 font-weight-bold">Phone Number:</div> <div class="col-md-5">{{$client->client_phone}}</div>
    </div>

   
  @if(count($trans)>0)
  
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
        @foreach($trans as $tran)
        <tr>
            <td></td>
            <td>{{$tran->good_id_no}}</td>
            <td>{{$tran->good_type}}</td>
            <td>{{$tran->good_pickup_point}}</td>
            <td>{{$tran->good_delivery_point}}</td>
            <td>₦{{number_format($tran->good_cost,2)}}</td>
            <td>{{$tran->created_at}}</td>

        </tr>
        @endforeach
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th>Total</th>
        <th>₦{{number_format($total_cost,2)}}</th>
          <th></th>
        </tr>
    </tbody>
  </table>
  <a class="btn btn-primary" href="{{ route('clients.transactionspdf',$client->id) }}">Download PDF</a>
    <button class="btn btn-primary" href="{{ route('clients.transactions',$client->id) }}"> Print pdf</button>
</div>
  @else 
  <br>  
  <p class="text-info ">No Transaction Recorded</p>
@endif
  </div>
</div>





@endsection

