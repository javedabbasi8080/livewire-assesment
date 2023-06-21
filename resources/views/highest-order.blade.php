@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">First customer who spent more money on orders</div>

                <div class="card-body">
                    <table class="table border">
                        
                        <tbody>
                            <tr>
                                <td>Name : {{$customer->customerName}}</td>
                            </tr>

                            <tr>
                                <td>Amount: {{$customer->total_amount}}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection