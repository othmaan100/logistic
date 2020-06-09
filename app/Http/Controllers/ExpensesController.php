<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Good;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dexpenses =  Expense::all();
        return view('expenses.index', compact('dexpenses'));
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $goods = Good::all();
      

        return view('expenses.create', compact('goods'));
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

            'good_id' => 'required',
            'expenses_cost' => 'required',
            'expenses_reason' => 'required',
            'expenses_date' => 'required',
            
            ]);

            $expenses= new Expense;
            $expenses->good_id= $request->input('good_id');
            $expenses->expenses_cost=  $request->input('expenses_cost');
            $expenses->expenses_reason=  $request->input('expenses_reason');
            $expenses->expenses_date=  $request->input('expenses_date');
            $expenses->save();
            /* return redirect('/posts')->with('success', 'Post Created');

    
            goods::create($request->all()); */
    
            return redirect()->route('expenses.index')
    
                    ->with('success','Expences Record Added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
        return view('expenses.edit',compact('expense'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
        $request->validate([
            'good_id' => 'required',
            'expenses_cost' => 'required',
            'expenses_reason' => 'required',
            'expenses_date' => 'required',
            ]);
    
            $expense->update($request->all());
    
            return redirect()->route('expenses.index')->with('success','Expenses information updated successfully');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
