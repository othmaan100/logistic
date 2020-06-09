<?php

namespace App\Http\Controllers;
use DB;
use App\Good;
use App\client;
use App\Truck;
use App\Drivers;
use App\GoodsType;


use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
#use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        //$goods = Good::all();
        $goods=DB::table('tbl_good')
                     ->join('tbl_clients','tbl_clients.id','tbl_good.client_id')
                     ->join('trucks','trucks.id','tbl_good.truck_id')
                     ->get();
       // return $goods;
        return view('goods.index', compact('goods'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $trucks = Truck::all();
        $clients = client::all();
        $count=count(Good::all());
         $count++;
        return view('goods.create', compact('trucks','clients','count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //,
 
        $request->validate([

            'good_id_no' => 'required',
            'truck_id' => 'required',
            'good_type' => 'required',
            'good_weight' => 'required',
            'good_cost' => 'required',
            'diesel_cost' => 'required',
            'commission' => 'required',
            'road_expenses' => 'required',
            'client_id' => 'required',
            'good_date_of_pickup' => 'required',
            'good_pickup_point' => 'required',
            'good_delivery_point' => 'required',
            'driver_id_no'=>'required',
    
            ]);

            $good= new Good;
            $good->good_id_no= $request->input('good_id_no');
            $good->truck_id=  $request->input('truck_id');
            $good->driver_id=  $request->input('driver_id_no');
            $g_type=  $request->input('good_type');
            if ($g_type=='Others') {
                # code...
                $good->good_type=  $request->input('other_type');
                $goodstype= new GoodsType;
                $goodstype->goods_type=   $request->input('other_type');
                $goodstype->save();
            }else{
                $good->good_type=  $request->input('good_type');
            }
            
            $good->good_weight=  $request->input('good_weight');
            $good->good_cost=  $request->input('good_cost');
            $good->diesel_cost=  $request->input('diesel_cost');
            $good->commission=  $request->input('commission');
            $good->road_expenses=  $request->input('road_expenses');
            $good->client_id=  $request->input('client_id');
            $good->good_date_of_pickup = $request->input('good_date_of_pickup');
            $good->good_date_of_delivery = $request->input('good_date_of_delivery');
            $good->good_pickup_point = $request->input('good_pickup_point');
            $good->good_delivery_point = $request->input('good_delivery_point');
            $good->save();

            
            /* return redirect('/posts')->with('success', 'Post Created');

    
            goods::create($request->all()); */
    
            return redirect()->route('goods.index')
    
                    ->with('success','Good Added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $good)
    {
        //
        return view('goods.show',compact('good'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $good)
    {
        //
        return view('goods.edit',compact('good'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Good $good)
    {
        //
        $request->validate([
            'good_id_no' => 'required',
            'good_type' => 'required',
            'good_date_of_pickup' => 'required',
            'good_date_of_delivery' => 'required',
            'good_waybill_No' => 'required',
            'good_cost_of_delivery' => 'required',
            'good_pickup_location' => 'required',
            'good_delivery_location' => 'required',
            ]);
    
            $good->update($request->all());
    
            return redirect()->route('goods.index')->with('success','Good information updated successfully');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        //
        $goods->delete();



        return redirect()->route('goods.index')

                ->with('success','Good Record deleted successfully');

    }

    public function TruckfetchDriver(Request $request)
    {
        $truck_id=$request['truck_id'];
         $good = Truck::where('id',$truck_id)->firstOrFail();
          //dd($good); 
         $driver_id_no= $good->driver_id_no;
         $driver = Drivers::where('driver_id_no',$driver_id_no)->firstOrFail();
         $driver_name=$driver->driver_name; 
         $driver_id= $driver->driver_id;
          echo '<label for="driver_name" class="font-weight-bold">Driver Name:</label>
         <input type="hidden" class="form-control" name="driver_id_no" value="'.$driver_id .'" id="driver_id_no"  readonly/>
         <input type="text" class="form-control" value="'. $driver_name .'" name="driver_name" id="driver_name"  readonly/>';
 ; 
    }
}
