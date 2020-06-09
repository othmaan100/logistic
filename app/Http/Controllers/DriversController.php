<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use App\Drivers;
use App\Good;
use App\Truck;
use Illuminate\Http\Request;
use NumberToWords\NumberToWords;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        
/* // create the number to words "manager" class
$numberToWords = new NumberToWords();

// build a new number transformer using the RFC 3066 language identifier
$numberTransformer = $numberToWords->getNumberTransformer('en');
return $numberTransformer->toWords(55852120); */
        $drivers=Drivers::orderBy('driver_id_no','desc')->paginate(5);
        //$drivers = Drivers::all()->paginate(8);
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $count=count(Drivers::all());
         $count++;
        $trucks = Truck::all();
       // $trucks = Truck::where('driver_id','STF-004');
        return view('drivers.create', compact('trucks','count'));
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

            'driver_id_no' => 'required',
            'title' => 'string',
            'driver_name' => 'required',
            'driver_phone' => 'required',
            'driver_address' => 'required|string',
            'image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
  
    
            ]);

            $driver= new Drivers;
            $driver->driver_id_no= $request->input('driver_id_no');
            $driver->driver_name= $request->input('title') ." ". $request->input('driver_name');
            $driver->driver_phone = $request->input('driver_phone');
            $driver->driver_address = $request->input('driver_address');
            if ($request->has('image')) {
                // Get image file
                $image = $request->file('image');
                // Make a image name based on user name and current timestamp
                $name = $request->input('driver_id_no'). '.' . $image->getClientOriginalExtension();
                // Define folder path
                $folder = 'Uploads/images/';
                $image->move( $folder,$name);
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name;//. '.' . $image->getClientOriginalExtension();
                
                // Set user profile image path in database to filePath
                $driver->driver_image = $filePath;
            }else{
                return $request;
                $driver->driver_image = " ";
            }
            $driver->save();
            /* return redirect('/posts')->with('success', 'Post Created');

    
            Drivers::create($request->all()); */
    
            return redirect()->route('drivers.index')
    
                    ->with('success','Driver Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function show(Drivers $driver)
    //public function show($driver)
    {
         $driverz = Drivers::where('driver_id',$driver->driver_id)->pluck('driver_id_no');
         $truck = Truck::where('driver_id_no',$driverz)->get();
         return view('drivers.show',compact('driver','truck'));
         /* if (sizeof($trucks)>0) {
             # code...
                return view('drivers.show',compact('driver','truck'));
         }else{
            return view('drivers.show',compact('driver'));
         }  */
         // $truck= $trucks[0];
          /* $a=compact('driver','truck');
         return $a; */ 
         //  $driverall = Drivers::all()->pluck('driver_id_no');
       
         //return $driver;
       // $driverall = Drivers::where('driver_id_no','$driver')->firstOrFail()->myTruck; 
        //$driverall = Drivers::find(1)->myTruck;
   // dd($ndriverall);
        //return $driverall;

       /*  $driverall = Drivers::find($driver);
        $id=$driverall['driver_id_no'];
        //dd($id);
        $rdriver = Drivers::where('driver_id_no','$driver')->firstOrFail();
        dd($rdriver); */
         /*$driverz = DB::table('tbl_drivers')->where('driver_id_no','=', ' $id')->get();
        return dd($driverz); */
        
        /* $driver = DB::table('tbl_drivers')
                    ->join('trucks', function ($join){
                        $join->on('tbl_drivers.driver_id_no','=','trucks.driver_id')
                       ->where('trucks.driver_id', '$driver'); 
                    })
                    ->get(); */
        //$client = App\client::orderBy('client_name', 'desc')->get();
       /*  $driver = DB::table('tbl_drivers')
                ->join('trucks','tbl_drivers.driver_id_no','=','trucks.driver_id')
                ->select('tbl_drivers.*','trucks.*')
                ->where('tbl_drivers.driver_id', '$driver')->first();

       return dd($driver);  */
       // $driver = Drivers::find($driver);
       // return dd($truck);
        
        //$driver = Drivers::find('$driver')->get();
        //$driver= Drivers::with('myTruck')->find($driver);
       // $driver= Drivers::with('myTruck')->find($driver);
       // $truck = $driver->myTruck;
       // return dd($truck);

      //  return view('drivers.show',compact('driver'));
        //return view('drivers.show',compact('driver','truck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function edit(Drivers $driver)
    {
        //
        $trucks = Truck::all();
       // $drivers = Drivers::findOrFail($drivers);
        return view('drivers.edit',compact('driver','trucks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drivers $driver)
    {
        //
        $request->validate([
            'driver_id_no' => 'required',
            'title' => 'string',
            'driver_name' => 'required',
            'driver_phone' => 'required',
            'driver_address' => 'required|string',
            ]);
            if ($request->has('image')) {
                // Get image file
                $image = $request->file('image');
                // Make a image name based on user name and current timestamp
                $name = $request->input('driver_id_no').'.'.$image->getClientOriginalExtension();
                // Define folder path
                $folder = 'Uploads/images/';
                $image->move( $folder,$name);
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name; #. '.' . $image->getClientOriginalExtension();
                
                // Set user profile image path in database to filePath
                $driver->driver_image = $filePath;
            }else{
                return $request;
                $driver->driver_image = " ";
            }
    
            $driver->update($request->all());
    
            return redirect()->route('drivers.index')->with('success','Driver information updated successfully');
     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drivers $drivers)
    {
        //

        $drivers->delete();



        return redirect()->route('drivers.index')

                ->with('success','Driver Record deleted successfully');

 
    }

    public function driverTasks($driverx)
    {
        # code...
        $driver= Drivers::find($driverx);
        $tasks= Drivers::find($driverx)->myTasks;
       // $driverid=$driver->driver_id_no;
        //$did=$driver->pluck('driver_id_no')->first();
        //$tasks= Drivers::where('driver_id_no',$driverid)->myTasks;
        //$total_cost= $trans->sum('good_cost');
      /*  $a= compact('tasks','driver'); 
       return $a; */
     return view('drivers.tasks',compact('tasks','driver'));
        //return view('clients.transaction',compact('trans','client'))->with('total_cost',$total_cost);
   
    }

    public function taskdetails($goodid)
    {
        # code...
        $good= Good::find($goodid);
        $driverid=$good->driver_id;
        $driver=Drivers::find($driverid);
        $expenses= Good::find($goodid)->myExpenses;
        $total_add_expenses=$expenses->sum('expenses_cost');
          
    return view('drivers.taskdetails',compact('good','expenses','driver'))->with('total_add_expenses',$total_add_expenses);
     
   

    }
    
    public function taskdetailspdf($taskid)
    {
        # code...
        
        $good= Good::find($taskid);
        $driverid=$good->driver_id;
        $driver=Drivers::find($driverid);
        $expenses= Good::find($taskid)->myExpenses;
        $total_add_expenses=$expenses->sum('expenses_cost');
        
        //return  View('drivers.taskdetailspdf',compact('good','total_add_expenses','expenses','driver'));
        // return  View('drivers.taskdetailstest',compact('good','total_add_expenses','expenses','driver'));
        
    //$pdf=PDF::loadView('drivers.taskdetailspdf',compact('good','total_cost','total_add_expenses','expenses','driver'))->setPaper('a4','portrait');
       
         $pdf=PDF::loadView('drivers.taskdetailstest')->setPaper('a4','portrait');
        
        return $pdf->download('drivers.taskdetailspdf');
        
    }
}
