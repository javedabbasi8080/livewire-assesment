<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function findCustomerWithHighestOrderAmount()
    {
        $data['customer'] = Customer::join('orders', 'customers.customerNumber', '=', 'orders.customerNumber')
            ->join('orderdetails', 'orders.orderNumber', '=', 'orderdetails.orderNumber')
            ->select('customers.*', DB::raw('SUM(orderdetails.priceEach * orderdetails.quantityOrdered) AS total_amount'))
            ->groupBy('customers.customerNumber')
            ->orderByDesc('total_amount')
            ->first();

        return view('highest-order', $data);
    }

    public function findCustomerWithMostOrders()
    {
        $data['customer'] = Customer::withCount('orders')
            ->orderByDesc('orders_count')
            ->first();
        return view('most-order', $data);
    }
}
