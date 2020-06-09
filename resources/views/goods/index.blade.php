@extends('layouts.app')

@section('content')
<style>
   body{
        font-size: .8rem;
    }
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
    <a class="btn btn-primary" href="{{ route('goods.create') }}"> Add New Good <i class="fa fa-fw fa-boxes"></i></a>
  </div>
 
  <div class="card-body">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
     <table class="table table-striped">
    <thead>
        <tr>
          <th></th>
          <th>Goods ID</th>
          <th>Goods Type</th>
          <th>Pickup Point</th>
          <th>Delivery Point</th>
          <th>Client</th>
          <th>Truck</th>
          <th colspan="3" class="text-center">Action</th>
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
            <td>{{$good->client_name}}</td>
            <td>{{$good->plate_number}}</td>
            <td><a href="{{ route('goods.edit',$good->good_id)}}" class="btn btn-primary" >Edit <i class="fa fa-fw fa-edit"> </i> </a></td>
            <td><a class="btn btn-primary" href="{{ route('goods.show',$good->good_id) }}" >Show <i class="fa fa-fw fa-eye"></i></a></td>
           {{--  <td>
                <form action="{{ route('goods.destroy', $good->good_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete <i class="fa fa-fw fa-trash"></i></button>
                </form>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
  
@endsection