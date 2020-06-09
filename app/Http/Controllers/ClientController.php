<?php

namespace App\Http\Controllers;

use App\client;
use App\Good;
use Illuminate\Http\Request;
use PDF;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $count=count(client::all());
        $count++;
        return view('clients.create')->with('count',$count);
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
            
            'client_name' => 'required',
            'client_phone' => 'required',
            'client_address' => 'required|string',
    
            ]);

            $client= new client;
            $client->client_name= $request->input('title') ." ". $request->input('client_name');
            $client->client_phone = $request->input('client_phone');
            $client->client_address = $request->input('client_address');
            $client->save();
            /* return redirect('/posts')->with('success', 'Post Created');

    
            clients::create($request->all()); */
    
            return redirect()->route('clients.index')
    
                    ->with('success','client Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
        return view('clients.show',compact('client'));
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client)
    {
        //
        return view('clients.edit',compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $client)
    {
        //
        $request->validate([
            'title' => 'string',
            'client_name' => 'required',
            'client_phone' => 'required',
            'client_address' => 'required|string',
            ]);
    
            $client->update($request->all());
    
            return redirect()->route('clients.index')->with('success','client information updated successfully');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(client $client)
    {
        //
        $client->delete();



        return redirect()->route('clients.index')

                ->with('success','client Record deleted successfully');

    }
    public function clientGood($client)
    {
        # code...
        $driverall = client::find('$client')->firstOrFail()->myGood; 
        //$driverall = Drivers::find(1)->myTruck;
    }

    public function transactions( $id)
    {
        # code...
        /*  $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        echo $f->format(1432);  */
        //return $id;

        $good= Good::find(2)->myPayments;// retriving amount paid for a good
        
        $client= client::find($id);
        $trans= client::find($id)->myGood;
        $total_cost= $trans->sum('good_cost');
        //dd($total_cost);
       // return view('clients.transaction',compact('trans','client'))->with('total_cost',$total_cost);
        return view('clients.transaction',compact('trans','client'))->with('total_cost',$total_cost);
    }

    public function updateBulk(Request $request)
    {
        $request->validate([
            'bulky_advance' => 'required',
            'client_id' => 'required',
            
            ]);

            if ($request->get('add')=='1') {
                # code...
                $client = client::find($request->get('client_id'));
                $client->bulky_advance = $client->bulky_advance + $request->get('bulky_advance');
                $client->save();
                return redirect()->route('clients.index')->with('success','client Bulky-Advance updated successfully');

            }
            
    }

    public function transactionspdf($id)
    {
        
        $client= client::find($id);
        $trans= client::find($id)->myGood;
        $total_cost= $trans->sum('good_cost');
       /*  $pdf=PDF::loadView('clients.transactionpdf',compact('trans','client','total_cost'))->setPaper('a4','portrait');
        return $pdf->download('clients.transactionpdf');
 */        
    return view('clients.transactionpdf',compact('trans','client'))->with('total_cost',$total_cost);
  //return view('clients.pdfTest',compact('trans','client'))->with('total_cost',$total_cost);
  /*  $pdf=PDF::loadView('clients.pdfTest',compact('trans','client','total_cost'));//->with('',$total_cost);
   return $pdf->download('clients.pdfTest'); */
   
  
   


       
    }
}
