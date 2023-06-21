@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ranks</div>

                <div class="card-body">
                    
                   <table>
                    
                    @foreach ( $ranks as $rank )
                    <tr>
                        <td>{{$rank['score']}}</td>
                        <td>Rank</td>
                        <td>{{$rank['rank']}}</td>
                     </tr>
                        
                    @endforeach
                    
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
