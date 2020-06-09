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
    <a class="btn btn-primary" href="{{ route('expenses.create') }}"> <strong> Add New Expenses <i class="fa fa-fw fa-money"> </i></strong></a>
  </div>
 
  <div class="card-body">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
     <table class="table table-striped table-responsive">
    <thead>
        <tr>
          <th>SN</th>
          <th>Date</th>
          <th>Good ID</th>
          <th>Expense Cost</th>
          <th>Reason</th>
          <th colspan="4" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dexpenses as $expense)
        <tr>
          <td></td>
            <td>{{$expense->expenses_date}}</td>
            <td>{{$expense->good_id}}</td>
            <td>₦{{$expense->expenses_cost}}</td>
            <td>{{$expense->expenses_reason}}</td>
            <td><a href="{{ route('expenses.edit',$expense->expenses_id)}}" class="btn btn-primary">Edit <i class="fa fa-fw fa-edit"> </i></a></td>
            <td><a class="btn btn-secondary" href="{{ route('expenses.show',$expense->expenses_id) }}">Show <i class="fa fa-fw fa-eye"> </i></a></td>
            <td>
                <form action="{{ route('expenses.destroy', $expense->expenses_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to delete this record')">Delete  <i class="fa fa-fw fa-trash"> </i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
  <div class="col-offset-9">
    <span class="fa-pull-right">
      <!-- Help in giving out links for paginated data-->
    </span>
    
    </div>

</div>
  
@endsection