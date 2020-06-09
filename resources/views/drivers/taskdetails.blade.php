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
  #expenses tr td:first-child::before {
    counter-increment: Serial;
    content: counter(Serial);
  }
</style>

  <div class="card uper">
    <a class="btn btn-primary" href="{{ route('drivers.tasks',$driver->driver_id) }}"> Back</a>

  <div class="card-header">
  
</div>
 
  <div class="card-body">
      <div class="row justify-content-md-center">
    <img src="{{asset('imgs/invoiceheader.png')}}" alt="">
</div> 
<hr class="my-4"/> 
<div class="offset-md-4 ">
    
    <h4 class=" display-6 font-weight-bold text-uppercase">Driver's Operation Details</h4>
      
    </div>
   
    
      
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

  <table class="table">
    <tr>
        
        <th>Good</th>
        <th>From</th>
        <th>To</th>
        <th>Cost</th>
        <th>Diesel</th>
        <th>Road Expenses</th>
        <th>Commision</th>
        <th>Date of Pickup</th>
        <th>Date of Delivery</th>
    </tr>
    <tr>
        
        <td>{{$good->good_type}}</td>
        <td>{{$good->good_pickup_point}}</td>
        <td>{{$good->good_delivery_point}}</td>
        <td>₦{{number_format($good->good_cost,2)}}</td>
        <td>₦{{number_format($good->diesel_cost,2)}}</td>
        <td>₦{{number_format($good->road_expenses,2)}}</td>
        <td>₦ @if ($good->commission=='1') 
            {{number_format(($good->good_cost*0.1),2)}}
            @else
            {{number_format($good->commission,2)}}
        @endif
            </td>
        <td>{{$good->good_date_of_pickup}}</td>
        <td>{{$good->good_date_of_delivery}}</td>
    </tr>
</table>

  @if(count($expenses)>0)
  
  <div class="container">

     <table id="expenses" class="table table-striped table-responsive" width="100%">
    <thead>
     
    
     
        <tr>
          <th>SN</th>
          <th>Date</th>
          <th>Additional Expenses Cost</th>
          <th>Reason</th>
         
          </tr>
      
    </thead>
    <tbody>
        @foreach($expenses as $expense)
        <tr>
            <td></td>
            <td>{{$expense->expenses_date}}</td>
            <td>₦{{number_format($expense->expenses_cost,2)}}</td>
            <td>{{$expense->expenses_reason}}</td>
           

        </tr>
        @endforeach
        <tr>
            <th></th>
            <th>Total</th>
            <th>₦{{number_format($total_add_expenses,2)}}</th>
            <th> </th>
            
        </tr>
       
    </tbody>
  </table>
  </div>
  <div class="container">
      <p>
          Total Expenses : ₦{{number_format(($total_add_expenses + $good->diesel_cost + $good->road_expenses + $good->commission),2)}}
      </p>
      <p>
        Net Balance  : ₦{{number_format(($good->good_cost - ($total_add_expenses + $good->diesel_cost + $good->road_expenses + $good->commission)),2)}}
    </p>
    <p>
        Payment Due : ₦{{number_format(($good->good_cost - ( $total_add_expenses + $good->diesel_cost + $good->road_expenses + $good->commission))*0.1,2)}}
    </p>
  </div>
  @else 
  <br>  
  <p class="text-info ">No Addtional Expenses Recorded</p>
  <div class="container">
    <p>
        Total Expenses :₦ {{ number_format(($good->diesel_cost + $good->road_expenses + $good->commission),2)}}
    </p>
    
    <p>
        Net Balance   : ₦{{number_format(($good->good_cost - ( $good->diesel_cost + $good->road_expenses + $good->commission)),2)}}
    </p>
    <p>
        Payment Due : ₦{{number_format(($good->good_cost - ( $good->diesel_cost + $good->road_expenses + $good->commission))*0.1,2)}}
    </p>
</div>
@endif
<a class="btn btn-primary" href="{{ route('drivers.taskdetailspdf',$good->good_id) }}">Download PDF</a>
 

  </div>
</div>





@endsection

