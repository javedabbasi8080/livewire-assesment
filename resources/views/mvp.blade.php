@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employee who made the most valuable sale. </div>

                <div class="card-body">
                    Employee: {{$employeeName}} <br>
                    Total Sales: {{$totalSales}} <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection