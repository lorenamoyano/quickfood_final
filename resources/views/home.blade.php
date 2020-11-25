@extends('layouts.app')

@section('content')
<div class="container">
    <section class="media">
        <div class="content">
            <h1 class="title">QuickFood</h1>
        </div>
        

    </section>



    <div class="col-sm-12" id="home">
        <div class="horizontal1">
            <a href="{{route('ver')}}"><img class="menu" src="https://img.icons8.com/ios/100/000000/restaurant-menu.png"></a>
        </div>
        <div class="horizontal2">
            @if(Auth::user())

            <a href="{{route('profile' , ['id' => Auth::user()->id])}}"><img class="menu" src="https://img.icons8.com/ios/100/000000/user.png"></a>
            @endif
        </div>

    </div>
</div>



@endsection