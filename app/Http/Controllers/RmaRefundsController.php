<?php

namespace App\Http\Controllers;

use App\Models\rmaRefunds;
use Illuminate\Http\Request;

class RmaRefundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rma_id' => 'required|integer',
            'method' => 'required|string',
            'txid' => 'required|string',
            'note' => 'required|string',
            'amount' => 'required|string',
        ]);

        // inserting new Customer
        $task = new rmaRefunds();
        $task->users_id = session('user')[0]->id;
        $task->rma_id = $validated['rma_id'];
        $task->amount = $validated['amount'];
        $task->txid = $validated['txid'];
        $task->note = $validated['note'];
        $task->method = $validated['method'];
        $task->save();
        return redirect()->back()->with('message', 'Refund Amount Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rmaRefunds  $rmaRefunds
     * @return \Illuminate\Http\Response
     */
    public function show(rmaRefunds $rmaRefunds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rmaRefunds  $rmaRefunds
     * @return \Illuminate\Http\Response
     */
    public function edit(rmaRefunds $rmaRefunds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rmaRefunds  $rmaRefunds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rmaRefunds $rmaRefunds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rmaRefunds  $rmaRefunds
     * @return \Illuminate\Http\Response
     */
    public function destroy(rmaRefunds $rmaRefunds)
    {
        //
    }
}