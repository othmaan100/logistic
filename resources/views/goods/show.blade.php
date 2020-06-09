@extends('layouts.app')

@section('content')
<style>
   
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
    <a class="btn btn-primary" href="{{ route('goods.index') }}"> Back</a>

  <div class="card-header">
    View Good's Information


               
            
  </div>
  <div class="card-body">
     <div class="row">

  <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>good ID Number:</strong>

                {{$good->good_id_no}}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Good Type:</strong>

                {{$good->good_type}}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>PickUp Date:</strong>

                {{$good->good_date_of_pickup}}

            </div>

        </div>
       

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Delivery Date:</strong>

                {{$good->good_date_of_delivery}}

            </div>

        </div> 
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>WayBill Number:</strong>

                {{$good->good_waybill_No}}

            </div>

        </div> 
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Delivery Cost:</strong>

                {{$good->good_cost_of_delivery}}

            </div>

        </div> 
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>PickUp Location:</strong>

                {{$good->good_pickup_location}}

            </div>

        </div> 
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Delivery Location:</strong>

                {{$good->good_delivery_location}}

            </div>

        </div> 
    </div>
    
  </div>
</div>
@endsection