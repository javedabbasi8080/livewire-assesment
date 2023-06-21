<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class MvpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employees = collect([
            [
                'name' => 'John',
                'email' => 'john3@example.com',
                'sales' => [
                    ['customer' => 'The Blue Rabbit Company', 'order_total' => 7444],
                    ['customer' => 'Black Melon', 'order_total' => 1445],
                    ['customer' => 'Foggy Toaster', 'order_total' => 700],
                ],
            ],
            [
                'name' => 'Jane',
                'email' => 'jane8@example.com',
                'sales' => [
                    ['customer' => 'The Grey Apple Company', 'order_total' => 203],
                    ['customer' => 'Yellow Cake', 'order_total' => 8730],
                    ['customer' => 'The Piping Bull Company', 'order_total' => 3337],
                    ['customer' => 'The Cloudy Dog Company', 'order_total' => 5310],
                ],
            ],
            [
                'name' => 'Dave',
                'email' => 'dave1@example.com',
                'sales' => [
                    ['customer' => 'The Acute Toaster Company', 'order_total' => 1091],
                    ['customer' => 'Green Mobile', 'order_total' => 2370],
                ],
            ],
        ]);

        $result = $employees->map(function ($employee) {
            $totalSales = collect($employee['sales'])->sum('order_total');
            return [
                'name' => $employee['name'],
                'email' => $employee['email'],
                'total_sales' => $totalSales,
            ];
        })->sort(function ($employee1, $employee2) {
            return $employee2['total_sales'] - $employee1['total_sales'];
        })->first();

        return view('mvp', [
            'employeeName' => $result['name'],
            'totalSales' => $result['total_sales'],
        ]);
    }
}
