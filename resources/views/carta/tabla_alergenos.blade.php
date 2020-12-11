@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive mx-auto text-align=center">
        <h3>{{$nombre->nombre}}</h3>
        <img src="{{ asset('img/alergenos.jpg') }}" style="max-width: 500px;" class="mb-3"> 
            <table class="responsive table_admin" width=500>
            
                @foreach($alergenos as $alergeno)
                <tr>
                
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">{{$alergeno->nombre}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection