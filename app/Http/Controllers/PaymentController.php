<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Good;
use App\client;
use DB;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

 
       //$payments = Payment::all();
        $dpayments=DB::table('tbl_payment')
                     ->join('tbl_clients','tbl_clients.id','tbl_payment.client_id')
                     ->join('tbl_good','tbl_good.good_id','tbl_payment.good_id')
                     ->where('tbl_payment.payment_status',0)
                     ->latest('tbl_payment.created_at')
                     ->get();
        $payments=DB::table('tbl_payment')
                     ->join('tbl_clients','tbl_clients.id','tbl_payment.client_id')
                     ->join('tbl_good','tbl_good.good_id','tbl_payment.good_id')
                     ->where('tbl_payment.payment_status',1)
                     ->latest('tbl_payment.created_at')
                     ->get();
        
        return view('payments.index', compact('payments','dpayments')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         /* $good=DB::table('tbl_good')
        ->where('good_id_no','G001')
        ->get();
return $good[0]->good_cost;  */

         $goods = Good::where('payment_status','0')->get();
        // return $goods;
      $clients = client::all();
         $count=count(Payment::all());
         $count++;
        return view('payments.create', compact('goods','count','clients'));
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'payment_id_no' => 'required',
            'good_id' => 'required|string',
            
            'payment_mode' => 'required|string',
            'client_id' => 'required|string',
            //'payment_deposit' => 'required',
            
            
    
            ]);
            $payment_id_no=$request->input('payment_id_no');
            $payment= new Payment;
            $payment->payment_id_no= $request->input('payment_id_no');
            $payment->payment_mode= $request->input('payment_mode');
            $payment->good_id= $request->input('good_id');
            $gid=$request->input('good_id');
            $payment->client_id = $request->input('client_id');
            $pm=$request->input('payment_mode');
            if ($pm=='FP' or $pm=='BP') {
                # code...
                $num= $request->input('good_cost');
                $amount=filter_var($num,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                $payment->payment_deposit =$amount;
                $payment->payment_status='1';

                $updateGood = DB::table('tbl_good')
                        ->where('good_id', $gid)
                        ->update(['payment_status' => 1]);


            }else {
                # code...
                $payment->payment_deposit = $payment->payment_deposit + $request->input('payment_deposit');
                

            }
           
            $payment->payment_mode=  $request->input('payment_mode');
            
            
            $payment->save();
           /*  $goodinfo= Good::find($gid);
            $goodCost=$goodinfo->good_cost;
 */
            $goodinfo= Good::find($gid);
            $goodCost=$goodinfo->good_cost;

            $pid= $payment->payment_id;
           
            $payinfo= Payment::find($pid);
            $gooddeposit=$payinfo->payment_deposit;

            if ($gooddeposit >= $goodCost) {
                # code...
                $updateGood = DB::table('tbl_good')
                        ->where('good_id', $gid)
                        ->update(['payment_status' => 1]);
                $updatepay = DB::table('tbl_payment')
                        ->where('payment_id', $pid)
                        ->update(['payment_status' => 1]);
            }
            
            /* return redirect('/posts')->with('success', 'Post Created');

    
            payments::create($request->all()); */
    
            return redirect()->route('payments.index')
    
                    ->with('success','Payment Added successfully.');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
        return view('payments.show',compact('payment'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
        return view('payments.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
        $request->validate([
            'payment_id_no' => 'required',
            'payment_id'=> 'required',
            'good_id'=> 'required',
            'payment_deposit' => 'required',
            ]);
            $payment_id=$request->input('payment_id');
            $gid=$request->input('good_id');
            $add_deposit=$request->input('payment_deposit');
            
            
$updatepay = DB::table('tbl_payment')
            ->where('payment_id', $payment_id)
            ->increment('payment_deposit', $add_deposit);
            //->update(['payment_deposit' , 'tbl_payment.payment_deposit'+$add_deposit]);

   
            $goodinfo= Good::find($gid);
            $goodCost=$goodinfo->good_cost;

           
            $payinfo= Payment::find($payment_id);
            $gooddeposit=$payinfo->payment_deposit;

            if ($gooddeposit >= $goodCost) {
                # code...
                $updateGood = DB::table('tbl_good')
                        ->where('good_id', $gid)
                        ->update(['payment_status' => 1]);
                $updatepay = DB::table('tbl_payment')
                        ->where('payment_id', $payment_id)
                        ->update(['payment_status' => 1]);
            }
           // $payment->update($request->all());
    
            return redirect()->route('payments.index')->with('success','Payment information updated successfully');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
        $payment->delete();



        return redirect()->route('payments.index')

                ->with('success','payment Record deleted successfully');

    }

    public function fetchGood(Request $request)     
    {
        # code...
         
        $good_id=$request['good_id'];
       // return $good_id;
    /*     $good=DB::table('tbl_good')
                    ->where('good_id_no','=',$good_id)->get();
         */
         // $good = Good::where('good_id_no',$good_id)->firstOrFail();
          //$good = Good::find($good_id)->firstOrFail();
      /*   $good = DB::table('tbl_good')
                    ->join('tbl_clients', 'tbl_clients.id','tbl_good.client_id')
                    ->where('tbl_good.good_id',$good_id)
                    ->get();
          //dd($good); 

          return $good; */

        //$output= $good->good_cost;
        //$output1= number_format($output,2);

       /*  $good=DB::table('tbl_good')
        ->where('good_id_no','G001')
        ->get();
return $good; */
       // $output='<input type="text" value="{{$good->good_cost}}">';
       // $output= $good->good_cost;



    /*    <div class="form-group col-md-4">

       <label for="good_cost" class="font-weight-bold">Good Cost:</label>
       <input type="text" class="form-control" name="good_cost" id="good_cost"  readonly/>
   </div>
   <div class="form-group col-md-4">

     <label for="client" class="font-weight-bold">Client :</label>
     <input type="text" class="form-control" name="client_id" id="client_id"  readonly/>
 </div>
 */
   
        //echo '₦' . $output1;
        //echo  $output;
      // echo "1111";


      
      $good = Good::where('good_id',$good_id)->firstOrFail();
      //dd($good); 
      $good_cost= '₦' .number_format($good->good_cost,2);
      $clientid= $good->client_id;
      $client = client::where('id',$clientid)->firstOrFail();
      $client_name=$client->client_name;
      //echo $client_name;
      $output= '<div class="form-group col-md-4"><label for="good_cost" class="font-weight-bold">Good Cost:</label>
      <input type="text" class="form-control" name="good_cost" value="'.$good_cost .'" id="good_cost"  readonly/></div>
      <input type="hidden" class="form-control" value="'. $clientid .'" name="client_id" id="client_id"  readonly/>
      <div class="form-group col-md-4">
      <label for="Client_name" class="font-weight-bold">Client Name:</label>
      <input type="text" class="form-control" name="client_name" value="'.$client_name .'" id="client_name"  readonly/>
      </div>
     ';
     echo $output;


    }
}
