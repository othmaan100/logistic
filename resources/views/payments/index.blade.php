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
  tr td{
    font-size: .8rem;
  }
    </style>

    
        <div class="card uper mt-12  ">

        <div class="card-header tab-card-header">
          <a class="btn btn-primary" href="{{ route('payments.create') }}"> Add New payment <i class="fa fa-fw fa-money-bill"> </i></a>
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Fully Paid</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Advance Payment</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent"> 
        <h5>Payment Records</h5>
              @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}  
              </div>
              <br />
            @endif
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
              @if (count($payments)>0)
                  
              

              <table  style="padding-left:10%;" class="table table-striped table-responsive" width="100%">
              <thead>
                  <tr>
                    <th>SN</th>
                    <th>Payment ID</th>
                    <th>Good </th>
                    <th>Client</th>
                    <th>Good Cost</th>
                    <th>Amount Deposited</th>
                    <th>Balance</th>
                    <th colspan="3" class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td></td>
                    <td>{{$payment->payment_id_no}}</td>
                    <td>{{$payment->good_type}}</td>
                    <td>{{$payment->client_name}}</td>
                    <td>₦{{number_format($payment->good_cost,2)}}</td> 
                    <td>₦{{number_format($payment->payment_deposit,2)}}</td>
                    <td>₦{{number_format($payment->good_cost - $payment->payment_deposit,2)}}</td>
                    {{-- <td><a href="{{ route('payments.edit',$payment->payment_id)}}" class="btn btn-primary">Edit <i class="fa fa-fw fa-edit"> </i></a></td> --}}
                    <td><a class="btn btn-primary" href="{{ route('payments.show',$payment->payment_id) }}">Show <i class="fa fa-fw fa-eye"> </i></a></td>
                    {{-- <td>
                        <form action="{{ route('payments.destroy', $payment->payment_id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to Delete this Record?')" >Delete <i class="fa fa-fw fa-trash"> </i></button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach



              </tbody>
              </table>
              @else
                  <p class="text-info">No Good Has been full Paid</p>
              @endif
          </div>

          <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
            {{-- <table class="table table-striped table-responsive  table-bordered" width="100%"> --}}
            

             @if (count($dpayments)>0)
                 
            
              <table class="table table-striped table-responsive  table-bordered" width="100%">
            
              <thead>
                  <tr>
                    <th>SN</th>
                    <th>Payment ID</th>
                    <th>Good ID No</th>
                    <th>Good </th>
                    <th>Client</th>
                    <th>Good Cost</th>
                    <th>Amount Deposited</th>
                    <th>Balance</th>
                    <th colspan="3" class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($dpayments as $dpayment)
                <tr>
                    <td></td>
                    <td>{{$dpayment->payment_id_no}}</td>
                    <td>{{$dpayment->good_id_no}}</td>
                    <td>{{$dpayment->good_type}}</td>
                    <td>{{$dpayment->client_name}}</td>
                    <td>₦{{number_format($dpayment->good_cost,2)}}</td> 
                    <td>₦{{number_format($dpayment->payment_deposit,2)}}</td>
                    <td>₦{{number_format($dpayment->good_cost - $dpayment->payment_deposit,2)}}</td>
                    <td><a href="{{ route('payments.edit',$dpayment->payment_id)}}" class="btn btn-primary">Update Payment <i class="fa fa-fw fa-edit"> </i></a></td>
                    {{-- <td><a class="btn btn-primary" href="{{ route('payments.show',$payment->payment_id) }}">Show <i class="fa fa-fw fa-eye"> </i></a></td> --}}
                    {{-- <td>
                        <form action="{{ route('payments.destroy', $payment->payment_id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to Delete this Record?')" >Delete <i class="fa fa-fw fa-trash"> </i></button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach



              </tbody>
              </table>
              @else
                 <p class="text-info">No Default Payment Remaining</p>
              @endif
          </div>





        </div>
      </div>
    


  
@endsection