@extends('layout.app')

@section('content')
<div class="container-fluid  p-0">
    <div class="container-fluid w-100 bg-primary section-blue p-4">
        <div class="card-comic" style="background-image: url('{{$single['thumb']}}')"> 
            <div class="row justify-content-between flex-column h-100">
                <div class="col-8 text-center">
                    <p>{{$single['type']}}</p>
                </div>
                <div class="col-12 text-center">
                    <p class="m-0">View Gallery</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5 w-75 margin-auto">
        <div class="col-8 ">
            <div class="info-comic text-left">
                <h3>{{$single['title']}}</h3>
                <div>
                    <div class="row border-bottom border-secondary row-available p-2">
                        <div class="col-9 d-flex justify-content-between align-items-center border-end border-secondary">
                            <p class="mb-0">U.S Price: {{$single['price']}}</p>
                            <p class="mb-0 ">AVAILABLE</p>
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <p class="mb-0 ">Check Availability <i class="fa-solid fa-sort-down "></i></p>
                        </div>
                    </div>
                </div>
                <p>{{$single['description']}}</p>
            </div>
        </div>
        <div class="col-4">
            <div class="advertisement">
                <p>Advertisement</p>
                <img src="{{ Vite::asset('resources/img/adv.jpg') }}" alt="adv">
            </div>
        </div>
    </div>
    <div class="container-fluid p-0 bg-grey">
        <div class="row w-75 margin-auto pt-3">
            <div class="col-8">
                <div class="talent">
                    <h4>Talent</h4>
                    <div class="row">
                        <div class="col-3">
                            <p>Art by:</p>
                        </div>
                        <div class="col-9">
                            <p>
                                @foreach (explode(',', $single['artists']) as $artist)
                                    <a href="#">{{$artist}},</a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p>Written by:</p>
                        </div>
                        <div class="col-9">
                            <p>
                                @foreach (explode(',', $single['writers']) as $writer)
                                    <a href="#">{{$writer}},</a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="specs">
                    <h4>Specs</h4>
                    <div class="row">
                        <div class="col-6">
                            <p>Series</p>
                        </div>
                        <div class="col-6">
                            <p><a href="">{{$single['series']}}</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>U.S Price:</p>
                        </div>
                        <div class="col-6">
                            <p>{{$single['price']}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>On Sale Date:</p>
                        </div>
                        <div class="col-6">
                            <p>{{$single['sale_date']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid  w-100 mt-5  m-0 border-top ">
            <div class="row w-75 margin-auto ">
                <div class="col-3 p-3 d-flex justify-content-between resources border border-top-0">
                    <p>Digital Comics</p>
                    <img  src="{{ Vite::asset('resources/img/buy-comics-digital-comics.png') }}" alt="Digital Comics">
                </div>
                <div class="col-3 p-3 d-flex justify-content-between resources border border-top-0">
                    <p>Shop DC</p>
                    <img src="{{ Vite::asset('resources/img/buy-comics-subscriptions.png') }}" alt="Shop Dc">
                </div>
                <div class="col-3 p-3 d-flex justify-content-between resources border border-top-0">
                    <p>Comic Shop Locator</p>
                    <img src="{{ Vite::asset('resources/img/buy-comics-shop-locator.png') }}" alt="Sho Locator">
                </div>
                <div class="col-3 p-3 d-flex justify-content-between resources border border-top-0">
                    <p>Subscriptions</p>
                    <img src="{{ Vite::asset('resources/img/buy-comics-merchandise.png') }}" alt="Subscriptions">
                </div>
            </div>
        </div>
    </div>
    
    
</div>

@endsection
