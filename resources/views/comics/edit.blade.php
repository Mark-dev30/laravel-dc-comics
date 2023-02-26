@extends('layout.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>UPDATE COMIC</h2>
        </div>
    </div>
    <div>
        {{-- CONDIZIONE SE CI SONO ERRORI NELL'INSERIMENTO DEI DATI NEI CAMPI INPUT --}}
        @if($errors->any())
        <div>
            <ul>
                {{-- CICLA GLI ERRORI --}}
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <form action="{{ route('comics.update', $comic->id) }}" method="POST">
        {{-- ASSEGNA UN TOKEN ALL'INTERNO DEL FORM PER EVITARE PROBLEMI DI SICUREZZA --}}
        @csrf
        @method('PUT')
        <div class="row mb-3 p-3">
            <label class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10 mb-3">
                <input type="text" class="form-control" name="thumb" placeholder="Insert the image" value="{{ old('thumb') ?? $comic->thumb}}">
                {{-- INSERISCE L'ERRORE SOTTO IL CAMPO INPUT --}}
                @error('thumb')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <label class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10 mb-3">
                <input type="text" class="form-control" name="title" placeholder="Insert the title" value="{{ old('title') ?? $comic->title}}">
                {{-- INSERISCE L'ERRORE SOTTO IL CAMPO INPUT --}}
                @error('title')
                    <p class="text-danger">{{$message}}</p> 
                @enderror
            </div>
            <label class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control" name="price" placeholder="Insert the price" value="{{ old('price') ?? $comic->price}}">
            </div>
            <label class="col-sm-2 col-form-label">Series</label>
            <div class="col-sm-10 mb-3">
                <input type="text" class="form-control" name="series" placeholder="Insert the series" value="{{ old('series') ?? $comic->series}}">
                {{-- INSERISCE L'ERRORE SOTTO IL CAMPO INPUT --}}
                @error('series')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <label class="col-sm-2 col-form-label">Sale Date</label>
            <div class="col-sm-10 mb-3">
                <input type="text" class="form-control" name="sale_date" placeholder="Insert the sale date" value="{{ old('sale_date') ?? $comic->sale_date}}">
                {{-- INSERISCE L'ERRORE SOTTO IL CAMPO INPUT --}}
                @error('sale_date')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <label class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10 mb-3">
                <input type="text" class="form-control" name="type" placeholder="Insert the type" value="{{ old('type') ?? $comic->type}}">
                {{-- INSERISCE L'ERRORE SOTTO IL CAMPO INPUT --}}
                @error('type')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10 mb-3">
              <textarea name="description" rows="10" cols="100" placeholder="Insert the description">{{ old('description') ?? $comic->description}}</textarea>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          
    </form>
</div>
@endsection