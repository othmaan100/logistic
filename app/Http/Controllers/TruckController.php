<?php

namespace App\Http\Controllers;

use App\Truck;
use App\Drivers;
use DB;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trucks = DB::table('trucks')
                    ->join('tbl_drivers', function ($join){
                        $join->on('tbl_drivers.driver_id_no','=','trucks.driver_id_no'); 
                    })->get();

         $ntrucks = DB::table('trucks')
                    ->where('driver_id_no',NULL) 
                    ->get(); 

        return view('trucks.index', compact('trucks','ntrucks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $drivers = Drivers::all();
        return view('trucks.create', compact('drivers'));
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

            'plate_number' => 'required',
            'truck_model' => 'string',
            
            
    
            ]);

            $truck= new Truck;
            $truck->truck_model= $request->input('truck_model');
            $truck->driver_id_no= $request->input('driver_id');
            $truck->plate_number = $request->input('plate_number');
            $truck->save();
            /* return redirect('/posts')->with('success', 'Post Created');

    
            trucks::create($request->all()); */
    
            return redirect()->route('trucks.index')
                    ->with('success','truck Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
   // public function show(Truck $truck)
    public function show( $truck)
    {
        //
         # code...
 //     
        

        $truck = Truck::find($truck);
        return view('trucks.show',compact('truck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        //
        $drivers = Drivers::all();
        return view('trucks.edit',compact('truck','drivers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        //
        $request->validate([
            'plate_number' => 'required',
            'truck_moddel' => 'string',
            
            ]);
    
            $truck->update($request->all());
    
            return redirect()->route('trucks.index')->with('success','truck information updated successfully');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        //
        $truck->delete();



        return redirect()->route('trucks.index')

                ->with('success','truck Recor deleted successfully');

    }
    public function operations($truckid)
    {
        # code...
        $truck= Truck::find($truckid);
        $TG = Truck::find($truckid)->myGood;
        $total_cost= $TG->sum('good_cost');
        return view('trucks.operations', compact('truck','total_cost'))->with('goods',$TG);

    }
}
