@extends('layouts.admin')

@section('content')
    <h1 class="text-center text-light my-5">Modifica la tecnologia</h1>

    @include('partials.error')

    <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name-input" class="form-label text-light">Nome<span class="text-danger">*</span></label>
            <input required technology="text" class="form-control" id="name-input" value="{{ old('name', $technology->name) }}" name="name" placeholder="Inserisci un titolo">
        </div>

        <div class="mb-3">
            <p class="text-light">
                I campi contrassegnati con <span class="text-danger">*</span> sono obbligatori
            </p>
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
@endsection