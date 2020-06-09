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
    Edit Good Information
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
  
   
      <form method="post" action="{{ route('goods.update', $good->good_id) }}">
                @csrf

        @method('PUT')
 
        <div class="form-group">
           
              <label for="good_id_no">Good ID Number:</label>
              <input type="text" class="form-control" name="good_id_no" id="good_id_no" value={{ $good->good_id_no }}>
          </div>

          <div class="form-group">
              <label for="good_type">Good Type:</label>
              <input type="text" class="form-control" name="good_type" id="good_type" value="{{ $good->good_type }}">
           </div>
           <div class="form-group">
              <label for="good_date_of_pickup">PickUp Date:</label>
              <input type="date" class="form-control" name="good_date_of_pickup" id="good_date_of_pickup"  value={{ $good->good_date_of_pickup }}>
           </div>

        <div class="form-group">
            <label for="good_date_of_delivery">Dilivery Date:</label>
            <input type="date" name="good_date_of_delivery" id="good_date_of_delivery" class="form-control" value={{ $good->good_date_of_delivery }}>
        </div>
        <div class="form-group">
            <label for="good_waybill_No">Way Bill Number:</label>
            <input type="text" class="form-control" name="good_waybill_No" id="good_waybill_No" value={{ $good->good_waybill_No }}>
        </div>

        <div class="form-group">
            <label for="good_type">Dilivery Cost:</label>
            <input type="text" class="form-control" name="good_cost_of_delivery" id="good_cost_of_delivery" value="{{ $good->good_cost_of_delivery }}">
         </div>
         <div class="form-group">
            <label for="good_pickup_location">PickUp Location:</label>
            <input type="text" class="form-control" name="good_pickup_location" id="good_pickup_location"  value={{ $good->good_pickup_location }}>
         </div>

      <div class="form-group">
          <label for="good_delivery_location">Dilivery Location:</label>
          <input type="text" name="good_delivery_location" id="good_delivery_location" class="form-control" value={{ $good->good_delivery_location}}>
      </div>




        
        <button type="submit" class="btn btn-primary">Update</button>
       
      </form>
  </div> 
</div>
@endsection