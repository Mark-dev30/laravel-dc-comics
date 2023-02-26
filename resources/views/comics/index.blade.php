@extends('layout.app')

@section('content')  
<div class="cont-jumbo">
    <h4 class="h4-series">CURRENT SERIES</h4>
    <div class="container-cards">
        <div class="content-cards">
            {{-- CICLA L'ARRAY $COMICS. L'ARRAY $COMICS E' LA LISTA DEI RECORD DELLA TABELLA COMICS PRESENTE NEL DATABASE COLLEGATO --}}
            {{-- COMIC E' IL SINGOLO RECORD --}}
            @foreach ($comics as $key => $comic)
                <div class="card">
                    {{-- RIMANDA ALLA FUNZIONE SHOW DEL CONTROLLER COMICS CON IL PASSAGGIO DELL'ID--}}
                    <a href="{{ route('comics.show',['comic' => $comic->id])}}">  
                        <div class="card-img">
                            {{-- PRENDE LA CHIAVE THUMB (IMMAGINE) NELL'ELEMENTO CICLATO --}}
                            <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
                        </div>
                        <div class="card-title">
                            {{-- PRENDE LA CHIAVE SERIES NELL'ELEMENTO CICLATO --}}
                            <p>{{$comic->series}}</p> 
                            <div class="d-flex justify-content-end">
                                {{-- RIMANDA ALLA FUNZIONE EDIT DEL CONTROLLER COMICS CON IL PASSAGGIO DELL'ID--}}
                                <a class="btn btn-warning btn-sm me-2" href="{{ route('comics.edit', ['comic' => $comic->id])}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <form action="{{ route('comics.destroy', ['comic' => $comic->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm confirm-delete-button" data-title='{{$comic->title}}'>
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="content-btn d-flex justify-content-evenly">
            <button class="more-btn">LOAD MORE</button>
            {{-- RIMANDA ALLA FUNZIONE CREATE DEL CONTROLLER COMICS --}}
            <a class="more-btn" href="{{ route('comics.create') }}">ADD A COMIC</a>
            
        </div>
    </div>
</div>
<div class="container-link">
    <div class="content-link">
        <div class="link">
            {{-- IMMAGINE CON IL RELATIVO PATH --}}
            <img src="{{ Vite::asset('resources/img/buy-comics-digital-comics.png') }}" alt="digital-comics">
            <span>digital comics</span>
        </div>
        <div class="link">
            {{-- IMMAGINE CON IL RELATIVO PATH --}}
            <img src="{{ Vite::asset('resources/img/buy-comics-merchandise.png') }}">
            <span>merchandise-comics</span>
        </div>
        <div class="link">
            {{-- IMMAGINE CON IL RELATIVO PATH --}}
            <img src="{{ Vite::asset('resources/img/buy-comics-subscriptions.png') }}">
            <span>subscriptions</span>
        </div>
        <div class="link">
            {{-- IMMAGINE CON IL RELATIVO PATH --}}
            <img src="{{ Vite::asset('resources/img/buy-comics-shop-locator.png') }}">
            <span>comic shop locator</span>
        </div>
        <div class="link">
            {{-- IMMAGINE CON IL RELATIVO PATH --}}
            <img src="{{ Vite::asset('resources/img/buy-dc-power-visa.svg') }}">
            <span>dc power visa</span>
        </div>
    </div>
</div>
{{-- INLUCE LA MODALE IN MODAL_DELETE.BLADE.PHP --}}
@include("partials.modal_delete")
@endsection
