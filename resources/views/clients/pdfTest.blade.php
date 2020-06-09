<style>
    body{
    counter-reset: Serial;  /*set the serial counter to zero*/
  }
#header h1,h4,h5,h6{
text-align:center; 
padding:0px;
margin: 0px;
}
sub{
    font-size: .8rem;
    /* margin-left: 30%; */
    margin: 0;
    padding-left: 60%;
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
 #table-top th {
    text-align: left;
} 
 #table_trans  td{
    border: 1px solid  #222;
    text-align: center;
}
#table_trans  th {
    border: 1px solid  #222;
    text-align: center;
} 
#table_trans{
    border-collapse: collapse;
    width: 100%;
  }
  #table_trans tr td:first-child::before{
    counter-increment: Serial;
    content: counter(Serial);
  }

</style>
<div id="header">
<h1>Bin-Abba Nigeria Limited </h1>
<sub><small> RC No: 1308745</small></sub>
<h4>Transporters and General Contracts</h4>
<h4>No. 47 Maganda Road, Kano</h4>
<h5>GSM no: 08034942000/08026972000/08092271000</h5>
<h6>binabbanig@gmail.com/info@binabba.com/www.binabba.com</h6>
<p id="trhistory">Client's Transaction History</p>
</div>
<div id="table-client">
<table  id="table-top"   width="100%"> 
    <tr>
        <td></td>
        <td></td>
        <th>Bulky Advance:</th>
        <td>#{{number_format($client->bulky_advance,2)}}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <th>Balance:</th>
        <td>#{{number_format($client->bulky_advance-$total_cost,2)}}</td>
    </tr>
    <tr>
        <th>Full Name:</th>
        <td>{{$client->client_name}}</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th>Address:</th>
        <td>{{$client->client_address}}</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th>Phone Number:</th>
        <td>{{$client->client_phone}}</td>
        <td></td>
        <td></td>
    </tr>
</table>
@if(count($trans)>0)
  
</div>

<table class="" id="table_trans" >
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
            <td>#{{number_format($tran->good_cost,2)}}</td>
            <td>{{$tran->created_at}}</td>

        </tr>
        @endforeach
        <tr>
          
          <th colspan="5" align="right">Total</th>
        <th colspan="2"  align="left">#{{number_format($total_cost,2)}}</th>
         
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

