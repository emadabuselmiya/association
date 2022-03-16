<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::latest()->get();
            return datatables()->of($orders)
                ->addColumn('service_name', function (Order $order) {
                    return $order->service->name;
                })
                ->addColumn('actions', function (Order $order) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $order->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('orders.edit', $order->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions', 'service_name'])
                ->make(true);
        }
        $orders = Order::latest()->get();

        return view('c-panel.orders.index',[
            'orders' => $orders,
        ]);
    }

    public function edit(Order $order)
    {
        # code...
        return view('c-panel.orders.edit',[
            'order' => $order,
        ]);
    }

    public function update(Request $request,Order $order)
    {
        # code...
        $request->validate([
            'status' => 'required',
            'note' => 'nullable|string'
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success',__('Order Status Or Notification Updated Done!'));;
    }

    public function destroy(Order $order)
    {
        # code...
        $order->delete();
        return redirect()->route('orders.index')->with('success',__('Order Deleted Done!'));

    }
}
