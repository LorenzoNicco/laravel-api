@extends('layouts.admin')

@section('content')
    <h1 class="text-center text-light my-5">Inserisci un nuovo progetto</h1>

    @include('partials.error')

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title-input" class="form-label text-light">Titolo<span class="text-danger">*</span></label>
            <input required type="text" class="form-control" id="title-input" name="title" placeholder="Inserisci un titolo">
        </div>
        
        <div class="mb-3">
            <label for="description-input" class="form-label text-light">Descrizione<span class="text-danger">*</span></label>
            <textarea required class="form-control" id="description-input" name="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="text-light" for="type_id">Scegli una tipologia di progetto</label>
            <select name="type_id" id="type_id">
                <option value="">Non definito</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="text-light form-label">Scegli una tecnologia da utilizzare:</label>
            @foreach ($technologies as $technology)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="technologies[]" id="tech-{{ $technology->id }}" value="{{ $technology->id }}">
                    <label class="form-check-label text-light" for="tech-{{ $technology->id }}">{{ $technology->name }}</label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="img" class="form-label text-light">Immagine</label>
            <input class="form-control" type="file" id="img" name="img" accept="image/*">
        </div>

        <div class="mb-3">
            <p class="text-light">
                I campi contrassegnati con <span class="text-danger">*</span> sono obbligatori
            </p>
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
@endsection