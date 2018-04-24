<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\Customer;
use App\EventLogs;
use App\Production;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ProductionController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
     
        $productions = Production::with('commodity')->orderBy('created_at', 'desc')->paginate(20);

        return view('calendar.index',compact('productions'));

    }

     public function calendar()
    {
      
        $productions = Production::where('isDone','=','0')->get();     
        
        return view('calendar.calendar',compact('productions'));
    }

    public function create()
    {

        $products = Commodity::all();

        $customers = Customer::all();




        //dd($products);

        return view('calendar.create', compact('products','customers'));
    }


    
    public function store(Request $request)
    {
        $production = new Production;

        $production->order_no =  ($request->order_no);
        $production->planned_start = $request->planned_start;
        $production->planned_end = $request->planned_end;
        $production->actual_start = $request->planned_start;
        $production->actual_end = $request->planned_end;
        $production->quantity = $request->quantity;
        $production->notes = $request->notes;
        $production->commodity_id = $request->commodity_id;
        $production->customer_id = $request->customer_id;
        
        $production->user_id = Auth::id();

        $production->save();

        $log = new EventLogs;
        $log->description = "Production " . $request->order_no . " has been created.";
        $log->production_id = Production::latest()->first()->id;
        $log->user_id = Auth::id();
        $log->save();

        $message = "Your schedule of " . $production->order_no . " has been created.";
        session()->flash('message',$message);
        
        return redirect('/calendar');
    }

     public function ajax(Request $request)
    {
       
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end)->addDays(-1);



        $production = Production::find($request->id);

        $log = new EventLogs;
        $log->description = "Date Changed from [" . 
                            Carbon::parse($production->actual_start)->toFormattedDateString() . 
                            " - " . 
                            Carbon::parse($production->actual_end)->toFormattedDateString() .
                            "] to [" .
                            $start->toFormattedDateString() . 
                            " - " . 
                            $end->toFormattedDateString() . 
                            "].";
        $log->production_id = $request->id;
        $log->user_id = Auth::id();
        $log->save();


        $production->actual_start = $start;
        $production->actual_end = $end;

        $production->save();
    }

    public function show(Production $production)
    {
        $logs = EventLogs::where('production_id', $production->id)->orderBy('created_at','desc')->paginate(5);

        return view('calendar.show',compact('production','logs'));
    }

    public function edit(Production $production)
    {

        dd($production->id);
    }

    public function confirm(Production $production)
    {


        $production->isDone = true;
        $production->save();

        $log = new EventLogs;
        $log->description = "Production " . $production->order_no . " has been produced.";
        $log->production_id = $production->id;
        $log->user_id = Auth::id();
        $log->save();

        return back();
    }

    public function unconfirm(Production $production)
    {
        $production->isDone = false;
        $production->save();

        $log = new EventLogs;
        $log->description = "Production " . $production->order_no . " was unproduced.";
        $log->production_id = $production->id;
        $log->user_id = Auth::id();
        $log->save();

        return back();
    }

    public function forecast(Production $production)
    {
        $production->isForecast = true;
        $production->save();

        $log = new EventLogs;
        $log->description = "Production " . $production->order_no . " was forecasted.";
        $log->production_id = $production->id;
        $log->user_id = Auth::id();
        $log->save();

        return back();
    }

    public function unforecast(Production $production)
    {
        $production->isForecast = false;
        $production->save();

        $log = new EventLogs;
        $log->description = "Production " . $production->order_no . " was confirmed.";
        $log->production_id = $production->id;
        $log->user_id = Auth::id();
        $log->save();

        return back();
    }

}
