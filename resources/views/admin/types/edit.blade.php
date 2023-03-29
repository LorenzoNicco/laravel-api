@extends('layouts.admin')

@section('content')
    <h1 class="text-center text-light my-5">Modifica la tipologia</h1>

    @include('partials.error')

    <form action="{{ route('admin.types.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title-input" class="form-label text-light">Titolo<span class="text-danger">*</span></label>
            <input required type="text" class="form-control" id="title-input" value="{{ old('title', $type->title) }}" name="title" placeholder="Inserisci un titolo">
        </div>

        <div class="mb-3">
            <p class="text-light">
                I campi contrassegnati con <span class="text-danger">*</span> sono obbligatori
            </p>
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
@endsection