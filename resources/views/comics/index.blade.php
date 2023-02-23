@extends('layout.app')

@section('content')  
<div class="cont-jumbo">
    <h4 class="h4-series">CURRENT SERIES</h4>
    <div class="container-cards">
        <div class="content-cards">
            @foreach ($comics as $key => $comic)
                <div class="card">
                    {{-- <a href="{{ route('info-comic',['id' => $comic['id']])}}">  --}} 
                        <div class="card-img">
                            <img src="{{$comic['thumb']}}" alt="{{$comic['title']}}">
                        </div>
                        <div class="card-title">
                            <p>{{$comic['series']}}</p>
                        </div>
                    {{-- </a> --}}
                </div>
            @endforeach
        </div>
        <div class="content-btn">
            <button class="more-btn">LOAD MORE</button>
        </div>
    </div>
</div>
<div class="container-link">
    <div class="content-link">
        <div class="link">
            <img src="{{ Vite::asset('resources/img/buy-comics-digital-comics.png') }}" alt="digital-comics">
            <span>digital comics</span>
        </div>
        <div class="link">
            <img src="{{ Vite::asset('resources/img/buy-comics-merchandise.png') }}">
            <span>merchandise-comics</span>
        </div>
        <div class="link">
            <img src="{{ Vite::asset('resources/img/buy-comics-subscriptions.png') }}">
            <span>subscriptions</span>
        </div>
        <div class="link">
            <img src="{{ Vite::asset('resources/img/buy-comics-shop-locator.png') }}">
            <span>comic shop locator</span>
        </div>
        <div class="link">
            <img src="{{ Vite::asset('resources/img/buy-dc-power-visa.svg') }}">
            <span>dc power visa</span>
        </div>
    </div>
</div>
@endsection