<?php

namespace App\Http\Controllers;

use App\Order;
use App\Partner;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders/index', [
            'orders' => Order::paginate(15),
        ]);
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
        if ($request->isMethod('get')) {
            return view('orders.form', [
                'order' => Order::find($id),
                'partners' => Partner::pluck('name', 'id')
            ]);
        } else {
            $rules = [
                'client_email' => 'required|email',
                'partner' => 'required',
                'status' => 'required',
            ];
            $this->validate($request, $rules);
            $order = Order::find($id);
            $order->client_email = $request->client_email;
            $order->partner_id = $request->partner;
            $order->status = $request->status;
            $order->save();
            return redirect('/orders');
        }
    }
}
