<style>
    body{
    counter-reset: Serial;  /*set the serial counter to zero*/
  }
#header h1,h4,h5,h6{
text-align:center; 
padding:0px;
margin: 0px;
}
small{
    font-size: .5rem;
   
    margin: 0;
    padding-left:55%;
    padding-top:0;
    padding-bottom: 0%;
    color: #222;
    
}


#trhistory{
font-weight: bold;
font-size: 1.5rem;
text-align: center;

}
th{
    color: blue;
}
#table-top{
    border-collapse: collapse;
    width: 100%;
}
 #table-top th {
    text-align: center;
    border: 1px solid  #222;
} 
#table-top  td{
    border: 1px solid  #222;
    text-align: center;
}
 #expenses  td{
    border: 1px solid  #222;
    text-align: center;
}
#expenses  th {
    border: 1px solid  #222;
    text-align: center;
} 
#expenses{
    border-collapse: collapse;
    width: 60%;
  }
  #expenses tr td:first-child::before{
    counter-increment: Serial;
    content: counter(Serial);
  }

</style>
<div id="header">
<h1>Bin-Abba Nigeria Limited <small> RC No: 1308745</small></h1>

<h4>Transporters and General Contracts</h4>
<h4>No. 47 Maganda Road, Kano</h4>
<h5>GSM no: 08034942000/08026972000/08092271000</h5>
<h6>binabbanig@gmail.com/info@binabba.com/www.binabba.com</h6>
<p id="trhistory">Driver's Operation Details</p>
</div>
      
    <div class="row">
     
        
        Full Name: {{$driver->driver_name}} 
    </div>
    <div class="row">
        Address:{{$driver->driver_address}}
    </div>
    <div class="row">
            Phone Number:{{$driver->driver_phone}}
    </div>

  

  <table  id="table-top" width="100%">
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
        <td>#{{number_format($good->good_cost,2)}}</td>
        <td>#{{number_format($good->diesel_cost,2)}}</td>
        <td>#{{number_format($good->road_expenses,2)}}</td>
        <td># @if ($good->commission=='1') 
            {{number_format(($good->good_cost*0.1),2)}}
            @else
            {{number_format($good->commission,2)}}
        @endif
            </td>
        <td>{{$good->good_date_of_pickup}}</td>
        <td>{{$good->good_date_of_delivery}}</td>
    </tr>
</table>
<br>
  @if(count($expenses)>0)
  
  <div class="container">

     <table id="expenses"  width="60%">
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
            <td>#{{number_format($expense->expenses_cost,2)}}</td>
            <td>{{$expense->expenses_reason}}</td>
           

        </tr>
        @endforeach
        <tr>
            
            <th colspan="2" align="right">Total</th>
            <th colspan="2" align="left">#{{number_format($total_add_expenses,2)}}</th>
            
            
        </tr>
       
    </tbody>
  </table>
  </div>
  <div class="container">
      <p>
          Total Expenses : #{{number_format(($total_add_expenses + $good->diesel_cost + $good->road_expenses + $good->commission),2)}}
      </p>
      <p>
        Balance  : #{{number_format(($good->good_cost - ($total_add_expenses + $good->diesel_cost + $good->road_expenses + $good->commission)),2)}}
    </p>
    <p>
        Payment Due : #{{number_format(($good->good_cost - ( $total_add_expenses + $good->diesel_cost + $good->road_expenses + $good->commission))*0.1,2)}}
    </p>
  </div>
  @else 
  <br>  
  <p class="text-info ">No Addtional Expenses Recorded</p>
  <div class="container">
    <p>
        Total Expenses :# {{ number_format(($good->diesel_cost + $good->road_expenses + $good->commission),2)}}
    </p>
    
    <p>
        Balance  : #{{number_format(($good->good_cost - ( $good->diesel_cost + $good->road_expenses + $good->commission)),2)}}
    </p>
    <p>
        Payment Due : #{{number_format(($good->good_cost - ( $good->diesel_cost + $good->road_expenses + $good->commission))*0.1,2)}}
    </p>
</div>
@endif


  </div>
</div>




