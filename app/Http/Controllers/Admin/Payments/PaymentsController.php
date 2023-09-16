<?php

namespace App\Http\Controllers\Admin\Payments;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
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
        if (session()->has('new_apt_id')) {
            return view('landlord.payments.create');
        }
        return redirect()->route('landlord.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_apt_id = session('new_apt_id');
        $request->validate([
            'commission' => ['required', 'string', 'max:255'],
            'prices' => ['required', 'string', 'max:255'],
        ]);
        $payment = new Payment();
        $payment->commission = $request->get('commission');
        $payment->prices = $request->get('prices');
        $payment->appartment_id = $new_apt_id;
        $payment->save();
        return redirect()->route('landlord.apartments.showPayments', $new_apt_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('landlord.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new_apt_id = session('new_apt_id');
        $request->validate([
            'commission' => ['required', 'string', 'max:255'],
            'prices' => ['required', 'string', 'max:255'],
        ]);
        $payment = Payment::findOrFail($id);
        $payment->commission = $request->get('commission');
        $payment->prices = $request->get('prices');
        $payment->save();
        return redirect()->route('landlord.apartments.showPayments', $new_apt_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new_apt_id = session('new_apt_id');
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('landlord.apartments.showPayments', $new_apt_id);
    }
}
