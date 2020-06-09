@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header text-center">
    <h5>Register Good <i class="fa fa-fw fa-boxes"></i></h5>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('goods.store') }}">
          
          <div class="form-group col-md-4">
              @csrf
                <label for="good_id_no" class="font-weight-bold">Goods ID Number:</label>
                <input type="text" class="form-control" name="good_id_no" id="good_id_no" value="G{{sprintf("%03d",$count)}}" readonly>
            </div>
            <div class="row">
            <div class="form-group col-md-3">
              <label for="truck_id" class="font-weight-bold"> Truck Assigned:</label>
                <select name="truck_id" id="truck_id" onchange="fetch_driver_id(this.value)" class="form-control">
                  <option value=" ">Select Truck</option>
                  @foreach($trucks as $truck) 
                  <option value="{{$truck->id}}"> {{$truck->truck_model}} With Plate Number: {{$truck->plate_number}} Assigned to {{$truck->driver_id_no }}</option>
                  @endforeach
                </select>
              </label>
          </div>
          <div class="form-group col-md-2 " id="drid">

            <label for="driver_id_no" class="font-weight-bold">Driver Name:</label>
            <input type="text" class="form-control" name="" id=""  readonly/>
           
          </div>

             <div class="form-group col-md-3">
                <label for="good_type" class=" font-weight-bold">Good Type:</label>
                <select class="form-control" name="good_type" id="good_type">
                  <option value="">Select Good</option>
                  <option value="Beans">Beans</option>
                  <option value="Bottle Water">Bottle Water</option>
                  <option value="Cements">Cements</option>
                  <option value="Cows">Cows</option>
                  <option value="Fertilizer">Fertilizer</option>
                  <option value="Flour">Flour</option>
                  <option value="Gravel">Gravel</option>
                  <option value="Gypsy">Gypsy</option>
                  <option value="Juice">Juice</option>
                  <option value="Leather">Leather</option>
                  <option value="Maize">Maize</option>
                  <option value="Millet">Millet</option>
                  <option value="Detergent">Detergent</option>
                  <option value="Plastic Rubber">Plastic Rubber </option>
                  <option value="PVC Rubber">PVC Rubber</option>
                  <option value="Semovita">Semovita</option>
                  <option value="Sesame">Sesame</option>
                  <option value="Soya-Beans">Soya-Beans</option>
                  <option value="Sugar">Sugar</option>
                  <option value="Timber">Timber</option>
                  <option value="Wheat">Wheat</option> 
                  <option value="Others">Others</option>
                </select>
            </div>

            <div class="form-group col-md-3">
              <label for="good_type" class=" font-weight-bold">Good Type(If others):</label>

              <input type="text" class="form-control" name="other_type" id="other_type" />
          </div>
          
            <div class="form-group col-md-4">
              <label for="good_weight" class="font-weight-bold"> Weight(Tones): </label>
                <select name="good_weight" id="good_weight" class="form-control">
                  <option value=" ">Select Weight</option>
                  <option value="30">  30 </option>
                  <option value="35">  35 </option>
                  <option value="40">  40 </option>
                  <option value="45">  45 </option>
                  <option value="50">  50 </option>
                  <option value="55">  55 </option>
                  <option value="60">  60 </option>
                </select>
              </label>
          </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
              <label for="good_cost" class="font-weight-bold"> Cost of Good:</label>
              <input type="number" class="form-control" name="good_cost" id="good_cost" />
          </div>
         
          <div class="form-group col-md-4">
            <label for="diesel_cost" class=" font-weight-bold">Diesel Cost:</label>
            <input type="text" class="form-control" name="diesel_cost" id="diesel_cost">
        </div>
          <div class="form-group col-md-4">
            <label for="commission" class="font-weight-bold"> Commission: </label>
              <select name="commission" id="commission" class="form-control">
                <option value=" ">Select Type</option>
                <option value="0">  No </option>
                <option value="1">  Yes </option>
               
              </select>
            </label>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="road_expenses" class=" font-weight-bold">Road Expenses:</label>
          <input type="text" class="form-control" name="road_expenses" id="road_expenses">
      </div>
     
            <div class="form-group col-md-4">
                <label for="client_id" class="font-weight-bold">Client:</label>
                <select class="form-control" id="client_id" name="client_id">
                    <option value="">Select Client</option>
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->client_name }} From {{ $client->client_address }} </option>
                    @endforeach
                    </select>
            </div>
            

            <div class="form-group col-md-4">
              <label for="good_date_of_pickup" class="4 font-weight-bold">PickUp Date:</label>
              <input type="date" class="form-control" name="good_date_of_pickup" id="good_date_of_pickup">
           </div>
           </div>

           <div class="row">
           <div class="form-group col-md-4">
              <label for="good_date_of_delivery" class="font-weight-bold">Delivery Date:</label>
              <input type="date" class="form-control" name="good_date_of_delivery" id="good_date_of_delivery" >
           </div>
          
           
            <div class="form-group col-md-4 ">
                <label for="good_pickup_point" class="font-weight-bold">PickUp Point:</label>
                <input type="text" class="form-control" name="good_pickup_point" id="good_pickup_point">
             </div>
            
             <div class="form-group col-md-4">
                <label for="good_delivery_point" class="font-weight-bold">Delivery Point:</label>
                <input type="text" class="form-control" name="good_delivery_point" id="good_delivery_point" >
             </div>
            </div>

          
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
<script>
    function fetch_driver_id(truck_id) {
      var truck_id=truck_id;
      var _token= $('input[name="_token"]').val();
    console.log(truck_id);
    var datas="truck_id="+truck_id+"&_token="+_token;
    
    $.ajax({
        url: "{{route('good.TruckfetchDriver')}}",
        method:"POST",
        data: datas,
        success:function(res){
          // alert(res);exit;
            //console.log(res);
            var a =res;
            //console.log(a);
            $("#drid").html(res);
              //$("#good_cost").value=a;
              //$('#gcst').innerHTML=a;
             // $("#driver_id_no").val(a);
         },
         error: function(xhr,status,error){
           var errrmsg=xhr.status+ ': '+xhr.statusText;
            alert('Eror-'+ errrmsg);
  }
      });
    
  }
</script>
@endsection